<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Source+Sans+Pro:400,600,700" rel="stylesheet" lazyload="true">
  <link rel="stylesheet" href="styles.css" type="text/css">
  <title>Keranjang Belanja - Yuk Masuk STAN</title>
  <meta name="description" content="Yukmasukstan adalah tempat kamu untuk mempersiapkan masuk STAN.">
  <meta name="keywords" content="kursus online">
  <link rel="icon" href="assets/images/favicon.png"> </head>

<body class="">
  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb my-2 bg-light" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="a_home.php"><i class="fa fa-fw fa-home"></i>Home</a>
            </li>   
            <li class="breadcrumb-item active">Keranjang Belanja</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-cart">
            <thead>
              <tr>
                <th class="table-active"></th>
                <th class="table-active">Produk</th>
                <th class="table-active">Harga</th>
                <th class="table-active">Jml</th>
                <th class="table-active">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><i class="fa fa-times-circle text-danger" aria-hidden="true"></i></td>
                <td>Iphone 12 ProMax</td>
                <td>Rp. 10.000.000</td>
                <td>1</td>
                <td>Rp. 10.000.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <form class="form-inline" method="post" action="https://formspree.io/">
            <input type="text" name="kupon" class="form-control m-1 w-25" placeholder="Kode Kupon">
            <button type="submit" class="btn btn-outline-primary m-1">Kupon</button>
          </form>
        </div>
        <div class="col-md-2">
          <a class="btn btn-primary m-1 w-100 disabled" href="" disabled="">Update</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-centered rounded p-4 p-footer-gray bg-light">
          <h5 class="text-dark">Total Belanja</h5>
          <table class="table">
            <thead>
              <tr></tr>
            </thead>
            <tbody>
              <tr>
                <td><b class="">Sub Total</b></td>
                <td class="text-dark">Rp. 10.000.000</td>
              </tr>
              <tr>
                <td class=""><b>PPN 70%</b></td>
                <td class="text-dark">Rp. 7.000.000</td>
              </tr>
                <td class=""><b>Total</b></td>
                <td class="text-dark">Rp. 17.000.000</td>
              </tr>
            </tbody>
          </table>
          <a class="btn m-1 w-100 btn-success" href="checkout.html"><i class="fa fa-fw fa-shopping-cart"></i>Proses</a>
        </div>
      </div>
    </div>
  </div>    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
<?= $this->endSection() ?>