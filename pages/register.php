<div style="display: flex; min-height: calc(100vh - 180px); align-items: center; justify-content: flex-end; padding: 40px 300px 40px 300px;">
    
    <!-- Левая часть: фото -->
    <div style="flex: 1; display: flex; justify-content: center; margin-right: 30px;">
        <img src="27f3e48a6efa17323784fdba72784be4.jpg" alt="Настройка оборудования" style="width: 100%; max-width: 1000px; border-radius: 28px; object-fit: cover; box-shadow: 0 20px 40px rgba(0,0,0,0.3); border: 1px solid rgba(124,158,255,0.2);">
    </div>
    
    <!-- Правая часть: форма -->
    <div style="flex: 1; max-width: 450px; background: #0f111c; border-radius: 28px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(124,158,255,0.2); z-index: 2;">
        <h2 style="text-align: center; margin-bottom: 30px; background: linear-gradient(135deg, #fff, #7c9eff); -webkit-background-clip: text; background-clip: text; color: transparent;">Регистрация</h2>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-msg"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <form action="/mediacare/actions/register_action.php" method="POST">
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" name="full_name" required style="width:100%; padding:14px; background:#1a1e30; border:1px solid #2e3452; border-radius:12px; color:white;">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required style="width:100%; padding:14px; background:#1a1e30; border:1px solid #2e3452; border-radius:12px; color:white;">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required style="width:100%; padding:14px; background:#1a1e30; border:1px solid #2e3452; border-radius:12px; color:white;">
            </div>
            <button type="submit" class="btn-primary" style="width:100%; padding:14px; margin-top:10px;">Зарегистрироваться</button>
        </form>
        
        <p style="text-align: center; margin-top: 25px;">Уже есть аккаунт? <a href="?page=login" style="color:#7c9eff;">Войти</a></p>
    </div>
    
</div>