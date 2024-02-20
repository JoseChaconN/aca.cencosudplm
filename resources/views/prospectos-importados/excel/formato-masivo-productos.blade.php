<!DOCTYPE html>
    <html>
        <body>
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid #0000;width:150px">Nombre Producto</th>
                        <th style="border: 1px solid #0000;width:150px">Código Sección</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </body>
    </html>