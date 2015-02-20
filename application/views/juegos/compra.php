<table>
    <tr>
        <th>TÍTULO</th>
        <th>PRECIO</th>
    </tr>
    <?php foreach ($this->cart->contents() as $articulo): ?>
        <tr>
            <td><?= $articulo['name'] ?></td>
            <td><?= $articulo['price'] ?></td>
        </tr>  
    <?php endforeach ?>
</table>