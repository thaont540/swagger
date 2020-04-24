<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:3200');
//header('Access-Control-Allow-Origin: ');

try {
    list($code, $msg) = [1, 'ok'];
    if (empty($editorContent = $_POST['editor_content'])) {
        throw new Exception('Invalid content');
    }

    $apiProject = fopen('yaml/project_api.yaml', "w") or die("Unable to open file!");
    fwrite($apiProject, $editorContent);
    fclose($apiProject);
} catch (Exception $e) {
    $code = 0;
    $msg = $e->getMessage();
}

echo json_encode(['code' => $code, 'msg' => $msg]);
?>
