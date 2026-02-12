# Generador de Actas - Hospital Dr. Gustavo Fricke

Un simple creador de archivos PDF para la gestión de actas de entrega de tarjetas de control de acceso del Hospital Dr. Gustavo Fricke. Esta aplicación permite registrar datos de usuarios y generar documentos PDF formateados con la información correspondiente.

## 🚀 Características

- **Registro de actas**: Formulario web para ingresar datos de funcionarios y sus tarjetas de acceso
- **Generación de PDF**: Creación automática de actas en formato PDF con diseño profesional
- **Búsqueda y filtrado**: Sistema de búsqueda para encontrar actas por código de tarjeta o nombre
- **Base de datos**: Almacenamiento persistente de todos los registros
- **Interfaz responsive**: Diseño adaptable a diferentes dispositivos

## Previsualización

![Preview](./preview.png)

## 📋 Requisitos

- PHP 7.0 o superior
- MySQL/MariaDB
- Servidor web (Apache, Nginx, etc.)
- Extensión FPDF para generación de PDF (instalada por defecto)

## 🛠️ Instalación

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/tu-usuario/actas-generator.git
   cd actas-generator
   ```

2. **Configurar la base de datos**:
   ```bash
   mysql -u root -p < actas_db.sql
   ```

3. **Configurar conexión**:
   - Editar los archivos PHP y modificar las credenciales de la base de datos:
   ```php
   $conexion = new mysqli("localhost", "usuario", "contraseña", "actas_db");
   ```

4. **Permisos**:
   ```bash
   chmod 755 *.php
   chmod -R 755 images/
   chmod -R 755 fpdf/
   ```

5. **Acceder a la aplicación**:
   - Abrir en el navegador: `http://localhost/actas-generator`

## 📁 Estructura del Proyecto

```
actas-generator/
├── index.php              # Página principal con formulario y listado
├── guardar_acta.php       # Procesamiento y guardado de datos
├── generar_pdf.php        # Generación de PDFs
├── buscar_acta.php        # Búsqueda de actas
├── actas_db.sql          # Estructura de la base de datos
├── style.css             # Estilos de la aplicación
├── favicon.ico           # Icono de la aplicación
├── images/               # Imágenes del sistema
│   ├── logo-hospital.png
│   └── firma-jefe.png
└── fpdf/                 # Librería para generación de PDFs
```

## 🔧 Uso

### Crear un nueva acta:
1. Completar el formulario con los datos del funcionario
2. Hacer clic en "Generar"
3. El sistema guardará los datos y mostrará confirmación

### Generar PDF:
1. Buscar el acta deseada en la tabla
2. Hacer clic en el icono 🧾
3. Se abrirá el PDF en una nueva pestaña

### Buscar actas:
1. Usar el formulario de búsqueda
2. Ingresar código de tarjeta o nombre
3. Presionar "Buscar"

## ⚠️ Advertencia Legal Importante

**Todos los derechos reservados sobre logotipos y firmas:**

- Los logotipos institucionales del Hospital Dr. Gustavo Fricke están protegidos por derechos de autor y propiedad intelectual.
- Las firmas digitales y manuscritas contenidas en este sistema son propiedad de sus respectivos titulares.
- El uso no autorizado de estos elementos fuera del contexto específico de esta aplicación puede constituir una violación de derechos de autor y acarrear consecuencias legales.

**Restricciones de uso:**
- Queda estrictamente prohibido el uso de logotipos y firmas en otros servicios o aplicaciones
- No se permite la reproducción, distribución o modificación de estos elementos sin autorización expresa
- El incumplimiento de estas restricciones puede ser sujeto a acciones legales

## 📄 Licencia

Este proyecto está licenciado bajo la **Licencia Educativa No Comercial (LENC) v1.0**.

### Permisos:
- ✅ Uso para fines educativos y de aprendizaje
- ✅ Estudio del código fuente
- ✅ Modificación para uso personal o educativo
- ✅ Distribución para propósitos académicos

### Restricciones:
- ❌ Uso comercial está estrictamente prohibido
- ❌ No se permite vender o monetizar este software
- ❌ Prohibida la redistribución con fines comerciales
- ❌ No se puede usar en entornos productivos sin autorización

**Ver el texto completo de la licencia en el archivo [LICENSE.md](LICENSE.md)**

### Atribución:
Este software fue desarrollado originalmente para el Hospital Dr. Gustavo Fricke. Todo uso debe mantener la atribución correspondiente y respetar los derechos de autor de los elementos institucionales.

## 🤝 Contribuciones

Las contribuciones son bienvenidas para fines educativos. Por favor:
- Mantener el propósito educativo del proyecto
- Respetar las restricciones de uso de elementos institucionales
- Documentar adecuadamente los cambios propuestos

---

**Nota importante:** Este software está diseñado específicamente para el contexto educativo y de aprendizaje del Hospital Dr. Gustavo Fricke. Su implementación en otros contextos requiere autorización expresa y respeto a los derechos de autor de los elementos institucionales.
