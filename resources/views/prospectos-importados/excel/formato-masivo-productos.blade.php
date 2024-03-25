<!DOCTYPE html>
    <html>
        <body>
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid #0000;width:150px">EAN 13</th>
                        <th style="border: 1px solid #0000;width:150px">Descripcion</th>
                        <th style="border: 1px solid #0000;width:150px">Código Sección</th>
                        <th style="border: 1px solid #0000;width:150px">Contenido Neto</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                            <td style="border: 1px solid #0000;width:150px;"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </body>
    </html>