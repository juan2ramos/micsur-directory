@extends('partials.emails')

@section('emailButtonMessage')
    <tr>
        <td style="font-size:0;padding:20px 70px ;" align="center">
            <table cellpadding="0" cellspacing="0" style="border:none;border-radius:3px;" align="center">
                <tbody>
                <tr>
                    <td style="background:#C5D257;border-radius:3px;color:#253A1B;cursor:auto;" align="center" valign="middle" bgcolor="#C5D257"><a class="mj-content" href="{{ url('password/reset/'.$token) }}" style="display:inline-block;text-decoration:none;background:#C5D257;border:1px solid #C5D257;border-radius:3px;color:#253A1B;font-family:trebuchet MS;font-size:13px;font-weight:bold;padding:20px 50px ;" target="_blank">
                            !CAMBIAR CONTRASEÑA!
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection

@section('emailMessage')
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#848484;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;">
                Haz Clic en el boton para reiniciar la contraseña.
                </br></br>
            </div>
        </td>
    </tr>
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#27383F;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;     font-weight: bolder;">
                ¡Te tendremos en cuenta para que seas parte de la  red de compras de productos agrícolas más grande en Latinoamérica.!
            </div>
        </td>
    </tr>
@endsection