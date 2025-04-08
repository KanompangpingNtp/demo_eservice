<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">แบบคำร้องใบอณุญาตสะสมอาหาร
    </h2> <br>

    <table class="table table-bordered table-striped" id="data_table">
        <thead class="text-center">
            <tr>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($FoodStorageInformations as $form)
            <tr>
                <td>
                    @foreach ($form->details as $detail)
                    @if ($detail->confirm_option == 1)
                    <a href="{{ route('CertificateFoodStorageLicenseUserPDF', $form->id) }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    @elseif ($detail->confirm_option == 2)
                    <a href="{{ route('CertificateFoodSalesUserPDF', $form->id) }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h2 class="text-center">แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ</h2> <br>
    <table class="table table-bordered table-striped" id="data_table">
        <thead class="text-center">
            <tr>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($HealthLicenseApp as $form)
            <tr>
                <td>
                    <a href="{{route('CertificateHealthHazardUserPDF',$form->id)}}" class="btn btn-danger btn-sm text-white">
                        <i class="bi bi-file-earmark-pdf"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

  </div>
</body>
</html>
