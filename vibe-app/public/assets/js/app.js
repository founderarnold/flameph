const guideState = {
    capital: '₱10k',
    category: 'Food',
};

const categoryPlans = {
    Food: 'Begin with a home-based specialty product, validate through pre-orders, track margins with free POS tools, then list on MarketplacePH once repeat demand appears.',
    Retail: 'Start with a narrow product bundle, source through verified suppliers, test weekly inventory turns, then open a FLAME PH directory profile.',
    Services: 'Package one clear offer, set introductory pricing, collect proof of work, and join a chapter where nearby customers can discover you.',
    'Online selling': 'Validate demand through social pre-orders, use lightweight fulfillment, monitor cash flow, and graduate into MarketplacePH once orders become consistent.',
    Agribusiness: 'Start with one high-demand crop or processed product, coordinate with local growers, document costs, and connect to buyer leads through chapters.',
};

function refreshGuide() {
    const title = document.querySelector('#guide-title');
    const copy = document.querySelector('#guide-copy');

    if (!title || !copy) {
        return;
    }

    title.textContent = `${guideState.capital} ${guideState.category} starter plan`;
    copy.textContent = categoryPlans[guideState.category] || categoryPlans.Food;

    document.querySelectorAll('[data-capital]').forEach((button) => {
        button.classList.toggle('is-active', button.dataset.capital === guideState.capital);
    });

    document.querySelectorAll('[data-category]').forEach((button) => {
        button.classList.toggle('is-active', button.dataset.category === guideState.category);
    });
}

document.querySelectorAll('[data-capital]').forEach((button) => {
    button.addEventListener('click', () => {
        guideState.capital = button.dataset.capital;
        refreshGuide();
    });
});

document.querySelectorAll('[data-category]').forEach((button) => {
    button.addEventListener('click', () => {
        guideState.category = button.dataset.category;
        refreshGuide();
    });
});

refreshGuide();
