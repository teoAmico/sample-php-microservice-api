<?php

use Phinx\Migration\AbstractMigration;

class CreateTestTable extends AbstractMigration
{

    public function change()
    {

        $table = $this->table('test',['id' => 'test_id','primary_key' => ['test_id']]);
 
    }
}
