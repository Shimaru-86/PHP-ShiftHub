<?php
  require_once __DIR__ . '/../../lib/Router.php';
  require_once __DIR__ . '/../../lib/Middlewares/Authentication.php';
  require_once __DIR__ . '/../../lib/Middlewares/Log.php';
  require_once __DIR__ . '/../../lib/Middlewares/Validation.php';
  require_once __DIR__ . '/../../config/Config.php';

  //Função de redirecionamento de Rotas
  function redirect($url) {
    header("Location: $url");
    header('Location: ' . BASE_URL . $url);
    exit;
  }

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

  //Rotas Liberadas sem Login
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/about', function () {
    return view('about');
  });

  Route::get('/apoiar', function () {
    return view('support');
  });

  Route::get('/exemplos', function () {
    return view('examples');
  });

  Route::get('/home', function () {
    return view('welcome');
  });

  Route::get('/login', function () {
    return view('login');
  });

  Route::get('/privacidade', function () {
    return view('privacy');
  });

  Route::get('/register', function () {
    return view('register');
  });

  // Rotas dependentes de Autenticação
  Route::get('/painel', function () {
    return view('painel');
  }, ['Authentication', 'Log']);

  // Rota para processar o login (POST) - Não tem função para abrir uma view, pois será aberta no processamento do login.
  Route::post('/auth', ['AuthController', 'login']);

  // Rota para adicionar novo usuário (POST) - Não tem função para abrir uma view.
  Route::post('/register', ['RegisterController', 'register']);

  // Rota para processar o logout
  Route::get('/logout', function () {
    session_start();  // Inicia a sessão (caso não tenha sido iniciada)
    session_unset();  // Remove todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    return redirect('/login');
  }, ['Log']);

  // Validação de ID na URL
  Route::get('/user', function () {
    return "Perfil do usuário";
  }, ['Validation']);
?>
