<?php




?>


<!DOCTYPE html>
<html>

<!-- Mirrored from QTFx .com/sign-up.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2020 10:43:11 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Reliable trading and investment platform for all">
  <meta name="author" content="QTFx ">
  <title>Signup | QTFx </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link href="images/favicon.png" rel="shortcut icon" type="image/png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .form-group #error {
      color: #a94442;
    }

    .goog-te-gadget .goog-te-combo {
      margin: 4px 0;
      width: 100%;
      padding: 7px;
      border-radius: 5px;
    }
  </style>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="/"><img src="images/auth-logo.png" class="img-responsive"></a>
    </div>
    <div id="google_translate_element"></div>
    <div class="register-box-body">
      <p class="login-box-msg">Create Account</p>
      <!-- json response will be here -->
      <div id="errorDiv">
      </div>
      <!-- json response will be here -->
      <form id="register-form" method="post">
        <input type="hidden" name="csrf_token" value="d7289a5cb4a6a0ab854c45388efed82d">
        <div class="form-group has-feedback">
          <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group has-feedback">
          <select class="form-control" name="country" id="country">
            <option value="">---Select Country---</option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
          <span class="help-block" id="error"></span>
        </div>
        <!--<div class="form-group has-feedback">
          <select class="form-control" name="gender" id="gender">
            <option value="">---Select Gender---</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <span class="help-block" id="error"></span>
        </div>-->
        <div class="form-group has-feedback">
          <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="help-block" id="error"></span>
        </div>

        <div class="social-auth-links text-center">
          <button type="submit" class="btn btn-block btn-info" id="btn-signup">
            <span class="glyphicon glyphicon-log-in"></span> Register
          </button>
        </div>
      </form>
      <br>
      <div class="text-center">
        Already have an account? <a href="sign-in.php" class="text-center">Login</a>
      </div>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
          pageLanguage: 'en'
        },
        'google_translate_element'
      );
      /*
    To remove the "powered by google",
    uncomment one of the following code blocks.
    NB: This breaks Google's Attribution Requirements:
    https://developers.google.com/translate/v2/attribution#attribution-and-logos
*/

      // Native (but only works in browsers that support query selector)
      if (typeof(document.querySelector) == 'function') {
        document.querySelector('.goog-logo-link').setAttribute('style', 'display: none');
        document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0');
      }

      // If you have jQuery - works cross-browser - uncomment this
      jQuery('.goog-logo-link').css('display', 'none');
      jQuery('.goog-te-gadget').css('font-size', '0');
    }
  </script>
  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="dist/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/signup.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '10%' /* optional */
      });
    });
  </script>

</body>

<!-- Mirrored from QTFx .com/sign-up.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2020 10:43:12 GMT -->

</html>