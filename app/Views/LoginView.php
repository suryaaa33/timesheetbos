<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>" />
</head>

<body>
    <div class="login">
        <div class="overlap-wrapper">
            <img class="shape" src="https://c.animaapp.com/mby1icz9HaDKUO/img/shape.png" alt="Background Shape" />
            <div class="input">
                <div class="details">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/auth') ?>" method="post">
                        <div class="text-wrapper-4">Login to Account</div>
                        <p class="please-enter-your-em">Please enter your username and password to continue</p>

                        <div class="email">
                            <label class="text-wrapper-2">Username:</label>
                            <div class="div">
                                <input type="text" name="username" placeholder="Username / Email" required />
                            </div>
                        </div>


                </div>
                <div class="password">
                    <label class="text-wrapper-2">Password</label>
                    <!-- <div class="text-wrapper-3">Forgot Password?</div> -->
                    <div class="div">
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                </div>



                <div class="button-compose">
                    <button type="submit" class="rectangle">Sign In</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>