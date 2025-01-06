<?php
  require_once __DIR__ . '/../../lib/Router.php';
  require_once __DIR__ . '/../../lib/Middlewares/Authentication.php';
  //require_once __DIR__ . '/../../lib/Middlewares/Log.php';
  require_once __DIR__ . '/../../lib/Middlewares/Validation.php';
  require_once __DIR__ . '/../../config/Config.php';

  //Rotas Liberadas sem Login
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/about', function () {
    return view('about');
  });

  Route::get('/login', function () {
    return view('login');
  });

  // Rotas dependentes de Autenticação
  Route::get('/painel', function () {
    return view('painel');
  }, ['Authentication']); //['Authentication', 'Log']);

  // Validação de ID na URL
  Route::get('/user', function () {
    return "Perfil do usuário";
  }, ['Validation']);

  // Função auxiliar para carregar a página
  function view($page) {
    $path = __DIR__ . '/../../pages/' . $page . '.php';
    if (file_exists($path)) {
      ob_start();
      include $path;
      return ob_get_clean();
    }
    return "Página não encontrada.";
  }
?>
