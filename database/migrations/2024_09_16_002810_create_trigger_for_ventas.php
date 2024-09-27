
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerForVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TRIGGER after_insert_ventas
            AFTER INSERT
            ON ventas
            FOR EACH ROW
            BEGIN
                DECLARE producto_existente INT;
                
                
                SELECT COUNT(*) INTO producto_existente
                FROM inventarios
                WHERE producto_id = NEW.producto_id;
                
                IF producto_existente > 0 THEN
                    
                    UPDATE inventarios
                    SET cantidad_disponible = cantidad_disponible - NEW.cantidad
                    WHERE producto_id = NEW.producto_id;
                
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
