<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\FileTransferService;

class UploadXMLUrlServer extends Component
{
    use WithFileUploads;

    public $file, $loja, $ano, $mes, $filial;

    public function save(FileTransferService $fileTransferService)
    {
        $localFilePath = $this->file->getRealPath();
        $remoteFilePath = '//192.168.0.98/SGLinx/XML ENTRADA/'.$filial.'/'.$ano.'/'.$mes.'/' . $this->file->getClientOriginalName();
        $server = '192.168.0.98';
        $username = 'Administrator';
        $password = 'asdKLP124*';

        $fileTransferService->transferFile($localFilePath, $remoteFilePath, $server, $username, $password);

        $this->dispatchBrowserEvent('fileUploadSuccess', ['filePath' => $remoteFilePath]);
    }
    public function render()
    {
        return view('livewire.upload-x-m-l-url-server');
    }
}
