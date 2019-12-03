<?php
header('Content-Type', 'application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $mail = new PHPMailer(true);

  try {
    // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'ssl://smtp.1und1.de';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'service@schickfix.com';
    $mail->Password   = 'GMBTransport-2018';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 465;

    $mail->setFrom('customservice@schickfix.com');
    $mail->addAddress("anfrage@schickfix.com");
    $mail->addAddress($data['email']);

    $mail->isHTML(true);
    $mail->Subject = 'SchickFix | Anfrage';
    $mail->Body    = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

  <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml">

  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width" name="viewport" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <title></title>
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
      }

      table,
      td,
      tr {
        vertical-align: top;
        border-collapse: collapse;
      }

      * {
        line-height: inherit;
      }

      a[x-apple-data-detectors=true] {
        color: inherit !important;
        text-decoration: none !important;
      }
    </style>
    <style id="media-query" type="text/css">
      @media (max-width: 520px) {

        .block-grid,
        .col {
          min-width: 320px !important;
          max-width: 100% !important;
          display: block !important;
        }

        .block-grid {
          width: 100% !important;
        }

        .col {
          width: 100% !important;
        }

        .col>div {
          margin: 0 auto;
        }

        img.fullwidth,
        img.fullwidthOnMobile {
          max-width: 100% !important;
        }

        .no-stack .col {
          min-width: 0 !important;
          display: table-cell !important;
        }

        .no-stack.two-up .col {
          width: 50% !important;
        }

        .no-stack .col.num4 {
          width: 33% !important;
        }

        .no-stack .col.num8 {
          width: 66% !important;
        }

        .no-stack .col.num4 {
          width: 33% !important;
        }

        .no-stack .col.num3 {
          width: 25% !important;
        }

        .no-stack .col.num6 {
          width: 50% !important;
        }

        .no-stack .col.num9 {
          width: 75% !important;
        }

        .video-block {
          max-width: none !important;
        }

        .mobile_hide {
          min-height: 0px;
          max-height: 0px;
          max-width: 0px;
          display: none;
          overflow: hidden;
          font-size: 0px;
        }

        .desktop_hide {
          display: block !important;
          max-height: none !important;
        }
      }
    </style>
  </head>

  <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
    <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
      style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;"
      valign="top" width="100%">
      <tbody>
        <tr style="vertical-align: top;" valign="top">
          <td style="word-break: break-word; vertical-align: top;" valign="top">
            <div style="background-color:transparent;">
              <div class="block-grid"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num12"
                    style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                        <div align="center" class="img-container center autowidth"
                          style="padding-right: 0px;padding-left: 0px;">
                          <img align="center" alt="Image" border="0" class="center autowidth"
                            src="https://smart-moove.de/schickfix/assets/imgs/logo-schrift.png"
                            style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 217px; display: block;"
                            title="Image" width="217" />
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                          style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                          valign="top" width="100%">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner"
                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; padding-left: 15px;"
                                valign="top">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content"
                                  height="0" role="presentation"
                                  style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 2px solid #2cda9c; height: 0px;"
                                  valign="top" width="100%">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td height="0"
                                        style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                        valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:150%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 18px; color: #555555;">
                            <p style="font-size: 14px; line-height: 21px; margin: 0;">
                              Hallo,<br />Vielen Dank für deine Anfrage.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>E-Mail :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['email'] . '
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Phone :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['phone_number'] . '
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Anzahl :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['anzahl'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Länge in cm :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['lange'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Breite in cm :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['briete'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Höhe in cm :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['hone'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Gewicht in kg :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['gewicht'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Abholort :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['abholort'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Abholland :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['abholland'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Zustellort :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['zustellort'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Zustellland :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">' . $data['zustellland'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid mixed-two-up"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num4"
                    style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#2cda9c;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #2cda9c;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <strong>Sonstige Information :</strong></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col num8"
                    style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 328px; width: 333px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid #CECECE; border-left:0px solid #CECECE; border-bottom:0px solid #CECECE; border-right:0px solid #CECECE; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 14px; line-height: 16px; margin: 0;">
                            ' . $data['sonstige_info'] . '</p
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="background-color:transparent;">
              <div class="block-grid"
                style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                  <div class="col num12"
                    style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
                    <div style="width:100% !important;">
                      <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:150%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 18px; color: #555555;">
                            <p style="font-size: 14px; line-height: 21px; margin: 0;">wir melden uns zeitnah bei Dir mit
                              ein personalisiertes Angebot.<br />Vielen Dank</p>
                          </div>
                        </div>
                        <div
                          style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px;">
                          <div
                            style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                              <span style="font-size: 12px; line-height: 14px;">Mit freundlichen Grüssen /</span><br />
                              <span style="font-size: 12px; line-height: 14px;">With best regards</span>
                            </p>
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                            <br />
                              <span style="font-size: 12px; line-height: 14px;">GMB Int. Transporte GmbH</span><br />
                              <span style="font-size: 12px; line-height: 14px;">Flurstrasse 38</span><br />
                              <span style="font-size: 12px; line-height: 14px;">85402 Kranzberg</span><br />
                              <span style="font-size: 12px; line-height: 14px;">Tel.: +49 / (0)8166 / 99017-0</span>
                            </p>
                            <p style="font-size: 12px; line-height: 14px; margin: 0;">
                            <br />
                              <span style="font-size: 12px; line-height: 14px;">Steuernummer: 115/127/50534</span><br />
                              <span style="font-size: 12px; line-height: 14px;">Internationale Steuernummer: DE815747825</span><br />
                              <span style="font-size: 12px; line-height: 14px;">Geschäftsführer: Ingeborg Görtler</span><br />
                              <span style="font-size: 12px; line-height: 14px;">Registergericht: Amtsgericht München</span><br />
                              <span style="font-size: 12px; line-height: 14px;">HRB 239519</span>
                            </p>
                          </div>
                        </div>
                        <div align="left" class="img-container left autowidth"
                          style="padding-right: 0px;padding-left: 0px;">
                          <img alt="Image" border="0" class="left autowidth" src="https://smart-moove.de/schickfix/assets/imgs/logo-schrift.png"
                            style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 217px; display: block;"
                            title="Image" width="217" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </body>

  </html>';
    if ($mail->send())
      echo "true";
    die;
  } catch (Exception $e) {
    echo "false";
    die;
  }
}
