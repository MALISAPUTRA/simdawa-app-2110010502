// libraries/Pdf.php

<?php

class PDF
{
    public function __construct()
    {
        include APPPATH . "third_party/fpdf/fpdf.php";
    }
}
