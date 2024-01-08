<?php
    global $top_file;
?>

<div class="footer">
    <table class="social-media-links">
        <tr>
            <th>Find us on social media!</th>
            <th>Donate!</th>
        </tr>
        <tr>
            <td>
                <a href="https://www.facebook.com/groups/genesis.scifi" target="_blank"><img src="/images/facebook-logo.svg" alt="Facebook" style="height: 50px; width: 50px;"/></a>
                <a href="https://x.com/Genesis_SciFi" target="_blank"><img src="/images/x-logo.svg" alt="X" style="height: 50px; width: 50px;"/></a>
                <a href="https://instagram.com/Genesis_SciFi" target="_blank"><img src="/images/instagram-logo-250x250.png" alt="Instagram" style="height: 50px; width: 50px;"/></a>
            </td>
            <td style="width: 181px;">
                <a href="https://www.buymeacoffee.com/genesissf" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/arial-blue.png" alt="Buy Me A Coffee" style="height: 50px !important;width: 181px !important;" ></a>
            </td>
        </tr>
    </table>

    <div class="copyright">
        &copy; 2011-<?=date("Y")?> Genesis Sci-fi club, the Basingstoke science fiction club; all graphics that link to other websites are owned by that website.
    </div>

    <div class="last-modified">
    <?php
        echo "Page Last Modified: " . date("l, j\<\s\u\p\>S\<\/\s\u\p\> F Y H:i.", filemtime($top_file));
    ?>
    </div>
</div>