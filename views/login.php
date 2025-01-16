<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cecbba6a61.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-center text-3xl font-bold mb-6">LOGIN</h1>
        <div class="login-content max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <form class="form" method="post" action="">
                <?php
                    include '../controllers/cLogin.php';
                ?>

                <h3 class="text-center text-2xl font-semibold mb-4">Ingresar datos de usuario</h3>

                <div class="mb-4">
                    <label for="usuario" class="block mb-2 text-sm font-medium text-gray-700">Nombre de usuario</label>
                    <input id="usuario" type="text" class="w-full rounded-full border border-stone-200 px-4 py-2 text-sm transition-all duration-300 placeholder:text-stone-400 focus:outline-none focus:ring-blue-400 md:px-6 md:py-3" name="usuario">
                </div>

                <div class="mb-4">
                    <label for="contraseña" class="block mb-2 text-sm font-medium text-gray-700">Contraseña</label>
                    <input id="contraseña" type="password" class="w-full rounded-full border border-stone-200 px-4 py-2 text-sm transition-all duration-300 placeholder:text-stone-400 focus:outline-none focus:ring-blue-400 md:px-6 md:py-3" name="contraseña">
                </div>

                <div class="mb-4 flex items-center">
                    <div class="fas fa-eye cursor-pointer" onclick="togglePasswordVisibility()" id="verpassword"></div>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-full hover:bg-blue-600 transition-all duration-300" name="btningresar" value="ok">Ingresar</button>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("contraseña");
            var icon = document.getElementById("verpassword");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
