<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre Usuario</th>
            <th>Nombre completo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Registro</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($objUsuario->listar() as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['nombre_usuario'] ?></td>
                <td><?php echo $usuario['nombre'] ?></td>
                <td><?php echo $usuario['rol'] ?></td>
                <td><?php echo $usuario['estado'] ?></td>
                <td><?php echo $usuario['fecha_reg'] ?></td>
                <td>
                    <button class="btn btn-warning" onclick="editar_usuario('<?php echo $usuario['id'] ?>')"><i class="fa fa-pencil"></i></button>
                    |
                    <button class="btn btn-danger" onclick="eliminar_usuario('<?php echo $usuario['id'] ?>')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php        
            }
        ?>
    </tbody>
</table>