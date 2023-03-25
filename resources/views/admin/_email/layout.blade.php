<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Send Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mail_default.css') }}" rel="stylesheet">
</head>

<body>
<table cellpadding="1" cellspacing="1" style="width: 100%; background-color: #ffffff; border-spacing: 0px">
    <tbody>
    <tr>
        <td style="background-color: #2643A0; height: 50px;">
            <br>
            <p class="text-white font-weight-bold mt-3" style="font-size: 28px; text-align: center; color: white;
            font-family: 'TimesNew Roman'">
                Hi!
            </p>
            <br>
        </td>
    </tr>
    <tr>
        <td style="font-size: 20px; width: 800px; font-family: 'Times New Roman'">
            @yield('content')
        </td>
    </tr>
    <tr>
        <td class="text-right" style="background-color: #2643A0; height: 50px;">
            <p style="font-size: 28px; text-align: center; color: white; font-family: 'TimesNew Roman'">
                <a href="{{ route('home') }}" style="font-size: 28px; color: white; padding-left: 10px; text-align:
                right; padding-right: 10px; font-family: 'Times New Roman'" target="_blank" rel="noopener">
                    ROCIP
                </a>
            </p>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
