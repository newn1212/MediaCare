<section class="hero">
    <div class="container hero-content">
        <div class="hero-text">
            <h1>Учёт заявок на ТО<br>мультимедийного оборудования</h1>
            <p style="font-size: 1.2rem; margin: 24px 0;">Автоматизация процессов обслуживания проекторов, аудиосистем, LED-экранов</p>
            <?php if (!isLoggedIn()): ?>
                <a href="?page=register" class="btn-primary">Создать заявку →</a>
            <?php else: ?>
                <a href="?page=new_ticket" class="btn-primary">➕ Создать заявку</a>
            <?php endif; ?>
        </div>
        <div class="hero-image">
            <img src="8d7540849673f8b8ae9de208f525adbc.jpg" alt="Оборудование">
        </div>
    </div>
</section>
<div class="container">
    <div style="display: flex; gap: 25px; flex-wrap: wrap; margin: 60px 0;">
        <div style="flex:1; background: #0f1222; border-radius: 32px; padding: 32px;">
            <i class="fas fa-clipboard-list" style="font-size: 2.5rem; color:#7c9eff"></i>
            <h3 style="margin: 18px 0;">Централизованный учёт</h3>
            <p>Все заявки в единой системе со статусами и приоритетами</p>
        </div>
        <div style="flex:1; background: #0f1222; border-radius: 32px; padding: 32px;">
            <i class="fas fa-chart-line" style="font-size: 2.5rem; color:#7c9eff"></i>
            <h3 style="margin: 18px 0;">Контроль выполнения</h3>
            <p>Отслеживание статуса заявки в реальном времени</p>
        </div>
    </div>
</div>