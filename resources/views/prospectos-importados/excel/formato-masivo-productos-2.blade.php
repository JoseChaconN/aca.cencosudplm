<!DOCTYPE html>
    <html>
        <body>
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid #0000;width:150px">Nombre Sección</th>
                        <th style="border: 1px solid #0000;width:150px">Código Sección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['secciones'] as $item)
                        <tr>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->nombre }}</td>
                            <td style="border: 1px solid #0000;width:150px;">{{ $item->codigo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
    </html>