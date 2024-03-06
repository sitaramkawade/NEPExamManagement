<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up()
    {   
        DB::statement("DROP VIEW IF EXISTS internaltoolviews");
        DB::statement("
            CREATE VIEW internaltoolviews AS
            SELECT
                ROW_NUMBER() OVER (ORDER BY itd.id, itm.id) AS id,
                itd.internaltooldoc_id,
                itd.internaltoolmaster_id,
                itd.is_multiple AS internal_tool_document_is_multiple,
                itd.status AS internal_tool_document_status,
                itd.created_at AS internal_tool_document_created_at,
                itd.updated_at AS internal_tool_document_updated_at,
                itm.id AS internal_tool_master_id,
                itm.toolname AS internal_tool_master_toolname,
                itm.course_type AS internal_tool_master_course_type,
                itm.status AS internal_tool_master_status,
                itm.created_at AS internal_tool_master_created_at,
                itm.updated_at AS internal_tool_master_updated_at
            FROM internaltooldocuments AS itd
            JOIN internaltoolmasters AS itm ON itd.internaltoolmaster_id = itm.id;
        ");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS internaltoolviews");
    }
};
