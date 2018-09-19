# treed.js

Bootstrap tree menu by [arthit](https://bootsnipp.com/arthit) 

Source : https://bootsnipp.com/snippets/yplrV

## Usage 
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="" href="bootstrap.min.css">
  <link rel="stylesheet" type="" href="treed.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="treed.js"></script>
</head>
<body>
  <ul id="menu">
    <li>
      <a href="#">Menu 1</a>
      <ul>
        <li>Menu 1-1</li>
        <li>Menu 1-2
          <ul>
            <li>Menu 1-2-1
              <ul>
                <li>Menu 1-2-1-1</li>
                <li>Menu 1-2-1-2</li>
                <li>Menu 1-2-1-3</li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="#">Menu 2</a></li>
  </ul>

  <script>
    $(function() {
      $('#menu').treed();
    });
  </script>
</body>
</html>
```

