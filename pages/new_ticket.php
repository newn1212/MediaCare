<?php requireLogin(); ?>
<div class="container">
    <div class="ticket-container">
        <h2 style="margin-bottom: 24px;">📝 Создание заявки на обслуживание</h2>
        <form action="/mediacare/actions/create_ticket.php" method="POST">
            <div class="form-group">
                <label>Тип оборудования *</label>
                <select name="equipment_type" required>
                    <option value="Проектор">Проектор</option>
                    <option value="Аудиосистема">Аудиосистема</option>
                    <option value="LED-экран">LED-экран</option>
                    <option value="Микшерный пульт">Микшерный пульт</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>
            <div class="form-group">
                <label>Модель / название *</label>
                <input type="text" name="equipment" placeholder="Например: Epson EB-695Wi" required>
            </div>
            <div class="form-group">
                <label>Описание проблемы *</label>
                <textarea name="description" rows="4" placeholder="Подробно опишите неисправность..." required></textarea>
            </div>
            <div class="form-group">
                <label>Приоритет</label>
                <select name="priority">
                    <option value="Низкий">Низкий</option>
                    <option value="Средний" selected>Средний</option>
                    <option value="Высокий">Высокий</option>
                </select>
            </div>
            <button type="submit" class="btn-primary" style="width:100%">Отправить заявку</button>
        </form>
    </div>
</div>