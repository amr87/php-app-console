# The App Console

The App console is a command line application for receiving two inputs from user , doing some math and database insertion/reading as well as creating html report.

## System Requirements

MYSQL & PHP

## Installation

in your mysql shell, please run the following commands:

```bash
CREATE DATABASE mydatabase CHARACTER SET utf8 COLLATE utf8_general_ci;
use mydatabase;
CREATE TABLE `shapes` (
  `id` int NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `average` decimal(10,2) NOT NULL,
  `area` decimal(10,2) NOT NULL,
  `area_squared` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `shapes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
```

please create a .env file in the project root as follow:

```env
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_NAME=mydatabase
DB_USER=myusername
DB_PASS=mypassword
```

## Usage

```bash
cd task-1
php index.php
```

## Sample Console Output

```bash
Enter width: 8
Enter height: 9
width: 8.00 || Height: 9.00 || Average: 8.50 || Area: 72.00 || Squared Area: 5184.00
width: 11.00 || Height: 22.00 || Average: 16.50 || Area: 242.00 || Squared Area: 58564.00
width: 4.00 || Height: 2.00 || Average: 3.00 || Area: 8.00 || Squared Area: 64.00
width: 9.00 || Height: 3.00 || Average: 6.00 || Area: 27.00 || Squared Area: 729.00
width: 4.00 || Height: 3.00 || Average: 3.50 || Area: 12.00 || Squared Area: 144.00
|| File output.html was generated ||
```

## Sample HTML Output

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <title>Report</title>
  </head>
  <body>
    <div class="container">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th>Width</th>
            <th>Height</th>
            <th>Average</th>
            <th>Area</th>
            <th>Area Squared</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>8.00</td>
            <td>9.00</td>
            <td>8.50</td>
            <td>72.00</td>
            <td>5184.00</td>
          </tr>
          <tr>
            <td>11.00</td>
            <td>22.00</td>
            <td>16.50</td>
            <td>242.00</td>
            <td>58564.00</td>
          </tr>
          <tr>
            <td>4.00</td>
            <td>2.00</td>
            <td>3.00</td>
            <td>8.00</td>
            <td>64.00</td>
          </tr>
          <tr>
            <td>9.00</td>
            <td>3.00</td>
            <td>6.00</td>
            <td>27.00</td>
            <td>729.00</td>
          </tr>
          <tr>
            <td>4.00</td>
            <td>3.00</td>
            <td>3.50</td>
            <td>12.00</td>
            <td>144.00</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
```

## Testing

Tested with PHP 7.2 / MYSQL 8.0 on Ubuntu 20.04 LTS.
