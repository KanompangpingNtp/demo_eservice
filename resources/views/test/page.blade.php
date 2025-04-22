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
    <div class="p-5">
        <h3 class="text-center">PDF</h3>
        <table class="table table-bordered table-striped mt-5" id="data_table">
            <thead>
                <tr>
                    <th class="text-center">หัวข้อ</th>
                    <th class="text-center">PDF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ภ.ป.๑ แนบแสดงรายการ ภาษีป้าย</td>
                    <td class="text-center">
                        <a href="{{route('exportpdf1')}}" class="btn btn-danger btn-sm" target="_blank">
                            หน้าที่ 1
                        </a>
                        <a href="{{route('exportpdf2')}}" class="btn btn-danger btn-sm" target="_blank">
                            หน้าที่ 2
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>หนังสือขอผ่อนชำระเงินภาษีที่ดินและสิ่งปลูกสร้าง / ห้องขุด</td>
                    <td class="text-center">
                        <a href="{{route('formExportPDF2')}}" class="btn btn-danger btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>(ภ.ด.ส.๑๐) คำร้องคัดค้านการประเมินภาษีหรือการเรียกเก็บภาษีที่ดินและสิ่งปลูกสร้าง</td>
                    <td class="text-center">
                        <a href="{{route('formExportPDF3')}}" class="btn btn-danger btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>(ภ.ด.ส.๕) แบบแจ้งการเปลี่ยนแปลงการใช้ประโยชน์ที่ดินหรือสิ่งปลูกสร้าง</td>
                    <td class="text-center">
                        <a href="{{route('formExportPDF4')}}" class="btn btn-danger btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>(ภ.ด.ส.๙) คำร้องขอรับเงินภาษีที่ดินและสิ่งปลูกสร้างคืน</td>
                    <td class="text-center">
                        <a href="{{route('formExportPDF5')}}" class="btn btn-danger btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>คำร้องทั่วไปขอถังขยะ</td>
                    <td class="text-center">
                        <a href="{{route('formExportPDF6')}}" class="btn btn-danger btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>
</html>
