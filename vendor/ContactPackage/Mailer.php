<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/12/14
 * Time: 4:13 PM
 */

namespace ContactPackage\Mailer;

class Mailer {

    static function notifyAdmin(){
        // multiple recipients
        $to  = 'logan@loganhenson.com';

// subject
        $subject = 'Birthday Reminders for August';

// message
        $message = $_SERVER['REMOTE_ADDR'].getdate().'
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html;' . "\n";

// Mail it
        if(!mail($to, $subject, $message, $headers)){
            die('mailerror');
        }
    }

} 