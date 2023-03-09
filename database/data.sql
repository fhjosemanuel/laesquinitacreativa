-- Datos que debes de cargar desupes de crear tu proyecto.

-- TABLE: CATEGORIES
    INSERT INTO categories(name, url)
        VALUES ('Carpetas', 'public/categorias/carpetas.jpg'),
                    ('Agendas', 'public/categorias/agendas.jpg'),
                        ('Mochilas', 'public/categorias/mochilas.jfif'),
                            ('Fundas', 'public/categorias/fundas.webp'),
                                ('Bolsas', 'public/categorias/bolsas.jpg');


-- DATOS NO REQUIRIDOS
    INSERT INTO products (id, name, description, price, category_id)
        VALUES (1, 'Agenda planificadora colorida', 'Diseños sin fecha y coloridos: La agenda de colores GoGirl no tiene fecha y dura todo un año, por lo que puedes empezar a usarla en cualquier momento y tomar un descanso sin perder páginas.', 445.11, 2);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/agendas/agendaplanificadora.jpg', 1);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (2, 'Agenda Perpetua', 'El planificador diario para usar semanal y mensualmente, puedes inciarla en cualquier fecha del año.', 340.00, 2);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/agendas/agendaperpetua.jpg', 2);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (3, 'Rise and Shine', 'Como un asistente personal todo en uno, este organizador mensual súper divertido y personalizable está lleno de más de 1,000 pegatinas y otras cosas increíbles.', 72.82, 2);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/agendas/riseandshine.jpg', 3);


    
    INSERT INTO products (id, name, description, price, category_id)
        VALUES (4, 'Samsill Earth s Choice, carpeta duradera', 'Fabricado en los Estados Unidos y fabricado en Fort Worth, Texas, hemos estado proporcionando carpetas de calidad desde 1953. (Utilizando materiales nacionales e importados)', 537.93, 1);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/carpetas/carpetamulticolores.jpg', 4);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (5, 'Libreta de Cubierta Textil', 'Pasta Textil, Tamaño 22x15cm, tamaño hoja 21x14 cm, 100 hojas rayadas, pasta rellenable, separador, candado de combinación.', 299.00, 1);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/carpetas/libretadecubierta.jpg', 5);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (6, 'Organizador de dinero,AVEDISTANTE planificador de presupuesto', 'na cubierta de carpeta tamaño A6, 8 sobres de efectivo, 12 hojas del mismo color, plan de 14 meses y hoja de presupuesto, 16 etiquetas autoadhesivas y 3 autoadhesivos multipropósito, adecuados para registrar las entradas y salidas de efectivo para cada categoría. Planes de gran valor para satisfacer sus necesidades diarias de registro, presupuesto y almacenamiento. AVEDISANTE Money Manager es perfecto para todas las edades para mantener su dinero organizado', 249.00, 1);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/carpetas/organizadordedinero.jpg', 6);



    INSERT INTO products (id, name, description, price, category_id)
        VALUES (7, 'Mochila de Viaje Portátil Mochila Antirrobo Impermeable', 'ESPACIO DE ALMACENAMIENTO Y BOLSILLOS: 43 x 29 x 12 cm, un compartimento principal con múltiples bolsillos pequeños, con capacidad para un portátil de 15.6 pulgadas, bolsillos interiores para iPad, bolígrafos, batería, ratón, llaves, teléfonos, cargador, etc. 1 bolsillo lateral y 1 compartimento frontal con cremallera para su taza, paraguas, cuaderno y otras cosas pequeñas. Haciendo su bolsa organizada. [NOTA: Se adapta a portátiles de 15.6'' o menos.]', 229.00, 3);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/mochiladeviajeportatil.jpg', 7);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (8, 'Mochila de Viaje Portátil Mochila Antirrobo Impermeable', 'puede ajustar su longitud para adaptarse a su altura y estructura corporal. Un bolsillo antirrobo oculto en la parte posterior protege sus objetos valiosos de los ladrones. Hay bolsillos a los lados de la bolsa para botellas de agua y sombrillas', 510.05, 3);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/mochilaestudianterosa.jpg', 8);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (9, 'Mochila impermeable antirrobo de gran capacidad bolso de moda', 'Mochila antirrobo para mujeres: Diseño de cremallera doble en forma de U en la parte trasera con función antirrobo para proteger el contenido de la bolsa. Cuenta con cómodas correas de hombro ajustables y asas de cuero duraderas con una correa de hombro corta extraíble, lo que le proporciona tres formas de llevarla como bolso de hombro, mochila informal de doble hombro o bolso de moda.', 279.00, 3);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/mochilaimpermiable.jpg', 9);



    INSERT INTO products (id, name, description, price, category_id)
        VALUES (10, 'Funda para Galaxy Tab S6 Lite con soporte para bolígrafo', 'Soporte integrado para bolígrafo S, hace que tu S Pen sea tan seguro como tu tablet todo el tiempo.', 300.30, 4);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/fundaparagalaxytab.jpg', 10);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (11, 'Melsbrinna Soporte para pasaporte', 'Hermoso diseño combinado: nuestro combo de soporte para pasaporte tiene 2 ranuras de plástico transparente y 1 ranura para pasaporte para combinar nuestro pasaporte, billetes de avión y algunas tarjetas, y la otra ranura de plástico transparente para guardar algunos documentos importantes como nuestra tarjeta de identificación o licencias de conducir, lo que puede garantizar que no olvidemos tomar o incluso nuestro retrato familiar.', 348.00, 4);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/melsbrinnasoporteparapasaporte.jpg', 11);

    INSERT INTO products (id, name, description, price, category_id)
        VALUES (12, 'Funda para carpeta de informes con clip, paquete de 10', 'El paquete de 10 portadas de informes de clip da a los informes un aspecto profesional elegante', 322.58, 4);
            INSERT INTO galleries (url, product_id)
                VALUES ('public/img/categorias/mochilas/melsbrinnasoporteparapasaporte.jpg', 12);