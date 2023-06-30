# BDD-Entrega-3
Repo para la entrega 3

# Entidades y atributos

Tiendas(idTienda, telefono, calle, numero, comuna)

Personal(IdPersonal, nombre, rut, edad, genero, fechaInicio, idTienda)

Productos(idProducto, nombre, precio, numcajas, categoria)

Dormitorios(idProducto, tamano, color, descripcion)

Iluminacion(idProducto, color, frecuencia, potencia, tension)

Living(idProducto, dimensiones, material, carga)

Cajas(id, descripcion, peso, idProducto)

Stock(idTienda, idProducto, cantidad, descuento)

relacion_comunaregion(Comuna, region)

jefes(idPersonal, idTienda)

vehiculo(id_vehiculo, patente, cap_carga, can_personas)

cliente(id_cliente, nombre, contrasena, rut, calle, num_domicilio, comuna, region)

producto(id_producto, nombre, precio, nro_cajas, tipo, tamano, color, descripcion, dimensiones, material, carga, frecuencia, potencia, tension)

caja(id_caja, id_producto, peso, descripcion)

compra(id_compra, fecha, id_producto, id_cliente, id_tienda, cantidad)

despacho(id_despacho, id_compra, fecha_entrega, id_vehiculo)

reaprtidor(id_repartidor, nombre, rut, edad, genero, id_vehiculo, es_chofer)

