# web-service

# Dokumentasi

<table border="1px" style="border-collapse:collapse;">
        <tr>
            <th>Request</th>
            <th>Operasi dijalankan</th>
        </tr>
        <tr>
            <td>GET url/{Controller}</td>
            <td>Tampilkan seluruh data</td>
        </tr>
        <tr>
            <td>GET url/{Controller}/{id}</td>
            <td>Tampilkan data by id</td>
        </tr>
        <tr>
            <td>POST url/{Controller}</td>
            <td>Tambah data baru</td>
        </tr>
        <tr>
            <td>DELETE url/{Controller}</td>
            <td>Hapus data</td>
        </tr>
        <tr>
            <td>PUT url/{Controller}</td>
            <td>Ubah data</td>
        </tr>
    </table>

<b>Contoh Response</b>
<p>GET url/{Controller}</p>

```
{
    "status": true,
    "data": [
        {
            "id": "1",
            "nama": "Jasa Rajaya",
            "nrp": "3120501030",
            "jurusan": "Teknik Pemesinan"
        },
        {
            "id": "3",
            "nama": "Siwa Simei",
            "nrp": "3502104023",
            "jurusan": "Teknik Peternakan"
        },
        {
            "id": "5",
            "nama": "Budi",
            "nrp": "3502104062",
            "jurusan": "Teknik Pertanian"
        }
    ]
```



<p>GET url/{Controller}/{id}</p>

```
{
    "status": true,
    "data": {
        "id": "1",
        "nama": "Jasa Rajaya",
        "nrp": "3120501030",
        "jurusan": "Teknik Pemesinan"
    }
}
```
