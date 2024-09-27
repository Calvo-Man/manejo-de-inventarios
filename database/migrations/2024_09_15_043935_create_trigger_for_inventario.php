
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerForInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TRIGGER after_insert_entrada_de_productos
            AFTER INSERT
            ON entrada_de_productos
            FOR EACH ROW
            BEGIN
                DECLARE producto_existente INT;
                
                
                SELECT COUNT(*) INTO producto_existente
                FROM inventarios
                WHERE producto_id = NEW.producto_id;
                
                IF producto_existente > 0 THEN
                    
                    UPDATE inventarios
                    SET cantidad_disponible = cantidad_disponible + NEW.cantidad
                    WHERE producto_id = NEW.producto_id;
                ELSE
                    
                    INSERT INTO inventarios (producto_id, cantidad_disponible)
                    VALUES (NEW.producto_id, NEW.cantidad);
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TRIGGER IF EXISTS after_insert_entrada_productos');
    }
}
