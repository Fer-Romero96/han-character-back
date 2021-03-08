# Preparando instalación en Windows 10
1. Instalar [Docker Desktop](https://www.docker.com/products/docker-desktop)
2. Instalar Windows Subsystem for Linux, utilza este [tutorial](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
3. Descarga la aplicación de [Ubuntu 20.04 LTS](https://www.microsoft.com/en-us/p/ubuntu-2004-lts/9n6svws3rx71?rtc=1&activetab=pivot:overviewtab)
4. Configurar docker desktop para que utilice WSL 2
    1. En settings debe estar marcada la casilla `Use the WSL 2 based engine`.
    2. En `Resources > WSL Integration` activa la casilla `Enable integration with my default WSL distro`
    3. En la misma seccíón activa la integración con `Ubuntu 20.04 LTS` para que se pueda acceder a docker desde la terminal de Ubuntu dentro de Windows.

NOTA: Si utilizas una cuenta que no tiene permisos de administrador debes agregarla al grupo de DockerUsers y la aplicación de Ubuntu debe descargarse con ese usuario porque no es posible acceder desde la cuenta de un usuario distinto al que instaló la aplicación sin importar los privilegios que tenga.

En caso de que utilices Visual Studio Code instalar la extension Remote - WSL hecha por Microsoft. Esto permite usar Visual Studio Code en Windows mientras todo sucede dentro de Ubuntu.
Presiona F1 y busca `Remote-WSL: New Window using Distro...` y después selecciona `Ubuntu 20.04 LTS`
IMPORTANTE: En la esquina inferior izquierda en el recuadro verde te indica que la terminal utilizada es la de Ubuntu 20.04.
Ahora sólo es seguir el proceso de instalación con la terminal de Ubuntu.

Para verificar que está bien instalado Docker Desktop, en la terminal de Ubuntu corre el comando `sudo docker ps -a`

# Recordatorio windows
Debe estar corriendo Docker Desktop en Windows para que se pueda acceder a los contenedores desde la terminal de Ubuntu.
En la esquina inferior izquierda de Visual Studio Code en el recuadro verde debe decir `WSL: Ubuntu-20.04`
Siempre usar la terminal como root porque causa muchos problemas de privilegios al utilizar los comandos. Comando `sudo -i`.
Folder de la cuenta normal se encuentra en `/home/cuenta_creada`

# Instalación Linux y Mac
1. Clonar repositorio y moverse a la carpeta hanchar.
2. Agregar alias `alias sail='bash vendor/bin/sail'`. Los siguientes comandos usan ese alias para acortar.
3. Correr los dockers con `sail up`
