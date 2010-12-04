$(document).ready(function()
    {
//        $('input.label').labelify();

        // call the tablesorter plugin
        $('table.tablesorter').tablesorter({
            widthFixed: true,
            widgets: ['zebra'],
            headers: {
                5: {
                    sorter:false
                },
                6: {
                    sorter:false
                }
            }
        });

        $('table.tablesorter').tablesorterPager({
            container: $('#pager')
        });

        $("label").inFieldLabels();

    });

