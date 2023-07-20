<div class="pupup">
    <div class="pupop_container">
        <div class="pupop_container_left">
            <h3>Вход в личный кабинет</h3>
            <form class="form-auth" action="#" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Ваш email</label value="{{old("email")}}">
                    <input type="text" id="email" name="email" class="form-control">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-dark form-control">Войти</button>
            </form>
        </div>
        <div class="pupop_container_right gap-3">
            <a href="" class="closed-popup-auth">X</a>
            <a href="" class="btn btn-warning">Зарегистрироваться</a>
            <p>
                После регистрации на сайте вам будет доступно отслеживание состояния заказов, личный кабинет и другие
                новые возможности.
            </p>
        </div>
    </div>
</div>
