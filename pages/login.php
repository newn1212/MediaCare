<div style="display: flex; min-height: calc(100vh - 180px); align-items: center; justify-content: flex-end; padding: 40px 60px 40px 200px;">
    
    <!-- Левая часть: форма -->
    <div style="flex: 1; max-width: 450px; background: #0f111c; border-radius: 28px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(124,158,255,0.2); z-index: 2;">
        <h2 style="text-align: center; margin-bottom: 30px; background: linear-gradient(135deg, #fff, #7c9eff); -webkit-background-clip: text; background-clip: text; color: transparent;">Добро пожаловать</h2>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-msg"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <form action="/mediacare/actions/login_action.php" method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required style="width:100%; padding:14px; background:#1a1e30; border:1px solid #2e3452; border-radius:12px; color:white;">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required style="width:100%; padding:14px; background:#1a1e30; border:1px solid #2e3452; border-radius:12px; color:white;">
            </div>
            <button type="submit" class="btn-primary" style="width:100%; padding:14px; margin-top:10px;">Войти</button>
        </form>
        
        <p style="text-align: center; margin-top: 25px;">Нет аккаунта? <a href="?page=register" style="color:#7c9eff;">Регистрация</a></p>
    </div>
    
    <!-- Правая часть: фото -->
    <div style="flex: 1; display: flex; justify-content: center; margin-left: 30px;">
        <img src="orig.jpeg" alt="Техническое обслуживание" style="width: 100%; max-width: 1000px; border-radius: 28px; object-fit: cover; box-shadow: 0 20px 40px rgba(0,0,0,0.3); border: 1px solid rgba(124,158,255,0.2);">
    </div>
    
</div>