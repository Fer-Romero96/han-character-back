# Preparando instalación en Windows 10
1. Instalar [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Instalar Windows Subsystem for Linux, utilza este [tutorial](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
3. Configurar docker desktop para que utilice WSL 2, utilza este [tutorial](https://docs.docker.com/docker-for-windows/wsl/). En mi caso ya estaba activado
4. Descarga la aplicación de [Ubuntu 20.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-2004-lts/9n6svws3rx71?rtc=1&activetab=pivot:overviewtab)

En caso de que utilices Visual Studio Code instalar la extension Remote - WSL hecha por Microsoft. Esto permite usar Visual Studio Code en Windows mientras todo sucede dentro de Ubuntu.
Presiona F1 y busca Remote-WSL: New Window using Distro... y después selecciona Ubuntu 20.04 LTS
En la esquina inferior izquierda en el recuadro verde te indica que la terminal utilizada es la de Ubuntu 20.04 y no la de Windows. 
Ahora sólo es seguir el proceso de instalación con la terminal de Ubuntu.

