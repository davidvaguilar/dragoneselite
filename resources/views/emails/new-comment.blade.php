<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo comentario</title>
</head>
<body style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; color: #74787E; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tbody>
            <tr>
                <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                    <table class="content" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                        <tbody>
                            <tr>
                                <td class="header" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 25px 0; text-align: center;">
                                    <a target="_blank" rel="noopener noreferrer" href="{{ url('/') }}" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #bbbfc3; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
                                        {{ config('app.name') }}
                                    </a>
                                </td>
                            </tr>
                            <!-- Email Body -->
                            <tr>
                                <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                    <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                        <!-- Body content -->
                                        <tbody>
                                            <tr>
                                                <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                                    <h1 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">Hola Administrador: </h1>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Tienes un nuevo comentario a la siguiente publicación.</p>
                                                    <div class="table" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                        <table style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                                            <thead style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                <tr>
                                                                    <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-bottom: 1px solid #EDEFF2; padding-bottom: 8px; margin: 0;">
                                                                        {{ $post->title }} <br> {!! $post->body !!}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                <tr>
                                                                    <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; padding: 10px 0; margin: 0;">
                                                                        <table width="100%" cellpadding="0" cellspacing="0" style="border-top:1px solid #f2f3f5;margin-bottom:20px;padding-top:20px">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="right" width="50">
                                                                                        <img src="https://ci5.googleusercontent.com/proxy/jm-gHIro1SPZ63mStJTHDIhSzC3L4RGBm3Sam3MEuOWi9eY9u7kBJTR72OusPcZSBxDas-oPM7I0aQqaxPn2L6roV2ZwB0YW=s0-d-e1-ft#https://i.udemycdn.com/user/50x50/25912828_6bb3_5.jpg" alt="" height="50" width="50" border="0" style="border-radius:50%;display:block" class="CToWUd">
                                                                                    </td>
                                                                                    <td valign="middle" align="left" style="vertical-align:middle;padding-left:10px">
                                                                                        <strong>{{ auth()->user()->name }}</strong> dice,
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 15px; line-height: 18px; padding: 10px 0; margin: 0;">{{ $comment }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 30px auto; padding: 0; text-align: center; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                                                    <a href="mailto:{{ auth()->user()->email }}" style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#007bff;border-top:12px solid #007bff;border-bottom:12px solid #007bff;border-right:18px solid #007bff;border-left:18px solid #007bff;display:inline-block" target="_blank">
                                                                                                        Responder por correo
                                                                                                    </a>
                                                                                                </td>
                                                                                                <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                                                                    <a href="https://api.whatsapp.com/send?phone=56{{ auth()->user()->movil }}" style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#28a745;border-top:12px solid #28a745;border-bottom:12px solid #28a745;border-right:18px solid #28a745;border-left:18px solid #28a745;display:inline-block" target="_blank">
                                                                                                        Responder por whatapp
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                                        Gracias,<br> {{-- config('app.name') --}}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                    <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                        <tbody>
                                            <tr>
                                                <td class="content-cell" align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #AEAEAE; font-size: 12px; text-align: center;"><a href="{{ url('http://www.dyi.cl') }}"> © 2020 dyi. Todos los derechos reservados.</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>