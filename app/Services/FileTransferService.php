<?php

namespace App\Services;

use phpseclib\Net\SFTP;

class FileTransferService
{
    public function transferFile($localFilePath, $remoteFilePath, $server, $username, $password)
    {
        $sftp = new SFTP($server);

        if (!$sftp->login($username, $password)) {
            throw new \Exception('Login falhou');
        }

        if (!$sftp->put($remoteFilePath, $localFilePath, SFTP::SOURCE_LOCAL_FILE)) {
            throw new \Exception('Falha ao transferir o arquivo');
        }

        return true;
    }
}
