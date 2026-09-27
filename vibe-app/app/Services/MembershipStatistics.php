<?php

namespace App\Services;

use App\Models\Membership;
use Illuminate\Support\Collection;

class MembershipStatistics
{
    public function summary(): array
    {
        $members = Membership::query()->get(['province', 'city_municipality']);
        $provinces = [];
        $locations = [];

        foreach ($members as $member) {
            $province = trim((string) $member->province);
            $city = trim((string) $member->city_municipality);
            if ($province === '' || $city === '') {
                continue;
            }

            $provinceKey = strtolower($province);
            $locationKey = $provinceKey . '|' . strtolower($city);
            $provinces[$provinceKey] ??= ['name' => $province, 'locations' => []];
            $provinces[$provinceKey]['locations'][$locationKey] ??= ['name' => $city, 'members' => 0];
            $provinces[$provinceKey]['locations'][$locationKey]['members']++;
            $locations[$locationKey] = true;
        }

        $byProvince = collect($provinces)->map(function (array $province): array {
            $locations = collect($province['locations']);

            return [
                'province' => $province['name'],
                'chapter_locations' => $locations->count(),
                'member_count' => $locations->sum('members'),
                'cities' => $locations->pluck('name')->sort()->values(),
            ];
        })->sortBy('province', SORT_NATURAL | SORT_FLAG_CASE)->values();

        return [
            'registered_members' => Membership::count(),
            'active_members' => Membership::where('status', 'active')->count(),
            'represented_provinces' => count($provinces),
            'chapter_locations' => count($locations),
            'chapters_by_province' => $byProvince,
        ];
    }
}
