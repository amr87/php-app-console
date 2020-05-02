<?php

class HtmlOutput implements OutputInterface
{
    /**
     * Output the result as html.
     *
     * @author Amr Gamal <amr.gamal878@gmail.com>
     *
     * @param [array] $data
     *
     * @return [void]
     */
    public function output($data)
    {
        $file = './output.html';
        $content = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
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
        <tbody>';
        foreach ($data as $row) {
            $content .= '<tr>';
            $content .= '<td>'.$row['width'].'</td>';
            $content .= '<td>'.$row['height'].'</td>';
            $content .= '<td>'.$row['average'].'</td>';
            $content .= '<td>'.$row['area'].'</td>';
            $content .= '<td>'.$row['area_squared'].'</td>';
            $content .= '</tr>';
        }
        $content .= '</tbody>
                 </table>
                 </div>
                 </body>
                 </html>';

        file_put_contents($file, $content);
        echo '|| File output.html was generated ||'.PHP_EOL;
    }
}
