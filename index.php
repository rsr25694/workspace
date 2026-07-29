
<?php

for ($i = 5; $i > 1; $i--) {
    print($i . "<br>");

    switch ($i) {
        case 5:
            print("The value is 5");
            break;
        case 4:
            print("The value is 4");
            break;
        case 3:
            print("The value is 3");
            break;
        case 2:
            print("The value is 2");
            break;
        default:
            print("The value is not between 2 and 5");
    }
}
