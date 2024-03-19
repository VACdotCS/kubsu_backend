<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>3-rd Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>

    <div id="content" class="d-grid gap-5 w-50 text-center bg-info rounded-5 mx-auto p-5">
      <form method="POST" class="p-5 gap-2 d-grid" id="form">
        <h1>Форма</h1>
        <input class="form-control ml-2 mr-2" required type="text" name="fullname" placeholder="ФИО"></input>
        <input class="form-control" required type="number" name="telephone" placeholder="Телефон"></input>
        <input class="form-control" required type="email" name="email" placeholder="Email"></input>
        <input class="form-control" required type="date" name="date" placeholder="Дата Рождения"></input>
        <p>Ваш пол</p>
        <p>
          <input required type="radio" name="answer" value="man">мужской<Br>
          <input required type="radio" name="answer" value="woman">женский<Br>
        </p>
        <p>Любимый язык программирования</p>
        <select name="programming_lang[]" multiple>
          <option value="Pascal">Pascal</option>
          <option value="C">C</option>
          <option value="C++">C++</option>
          <option value="JavaScript">JavaScript</option>
          <option value="PHP">PHP</option>
          <option value="Python">Python</option>
          <option value="Java">Java</option>
          <option value="Haskel">Haskel</option>
          <option value="Clojure">Clojure</option>
          <option value="Prolog">Prolog</option>
          <option value="Scala">Scala</option>  
        </select>
        <p>Биография</p>
        
        <textarea name="biography">
          
        </textarea>

        <p>
          <input required type="checkbox" name="agreement">с контрактом ознакомлен (а)<Br>
        </p>

        <button class="btn btn-primary" type="submit" value="ok">Сохранить</button>
      </form>


    <div class="container">
      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <span class="mb-3 mb-md-0 text-body-secondary">Табуркин Владимир Сергеевич (C)</span>
        </div>
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    <script src="./gallery.js"></script>
  </body>
</html>
