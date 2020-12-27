<?php

namespace RebelCode\Spotlight\Instagram\Modules\Dev;

use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\CoreModule;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;

/**
 * The developers page.
 *
 * @since 0.1
 */
class DevPage
{
    /**
     * @since 0.1
     *
     * @var CoreModule
     */
    protected $core;

    /**
     * @since 0.1
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param CoreModule         $core
     * @param ContainerInterface $container
     */
    public function __construct(CoreModule $core, ContainerInterface $container)
    {
        $this->core = $core;
        $this->container = $container;
    }

    /**
     * @since 0.1
     */
    public function __invoke()
    {
        $currTab = filter_input(INPUT_GET, 'tab');
        $currTab = empty($currTab) ? 'main' : $currTab;

        $tabUrl = function ($tab) {
            return admin_url('admin.php?page=sli-dev&tab=' . $tab);
        };

        $tabClass = function ($tab) use ($currTab) {
            return 'nav-tab' . ($tab === $currTab ? ' nav-tab-active' : '');
        };

        $tabContent = function () use ($currTab) {
            switch ($currTab) {
                default:
                    $this->mainTab();
                    break;
                case 'db':
                    $this->dbTab();
                    break;
                case 'services':
                    $this->servicesTab();
                    break;
            }
        }

        ?>
        <div class="wrap">
            <h1>Spotlight Dev</h1>

            <nav class="nav-tab-wrapper">
                <a class="<?= $tabClass('main') ?>" href="<?= $tabUrl('main') ?>">
                    Main
                </a>
                <a class="<?= $tabClass('db') ?>" href="<?= $tabUrl('db') ?>">
                    Database
                </a>
                <a class="<?= $tabClass('services') ?>" href="<?= $tabUrl('services') ?>">
                    Services
                </a>
            </nav>

            <?php $tabContent() ?>
        </div>
        <?php

        return;
    }

    /**
     * Renders the main debug tab.
     *
     * @since 0.1
     */
    protected function mainTab()
    {
        ?>

        <h2>Operations</h2>

        <form method="POST">
            <input type="hidden" name="sli_reset_db" value="<?= wp_create_nonce('sli_reset_db') ?>" />
            <p>Remove all plugin data from the database</p>
            <p>
                <label>
                    <input type="checkbox" name="sli_reset_keep_accounts" value="1" checked />
                    Keep accounts
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" name="sli_reset_keep_feeds" value="1" checked />
                    Keep feeds
                </label>
            </p>
            <button type="submit" class="button">
                Reset database
            </button>
        </form>

        <h2>Debug Log</h2>

        <?php

        $debugLog = file_exists(WP_CONTENT_DIR . '/debug.log')
            ? file_get_contents(WP_CONTENT_DIR . '/debug.log')
            : '';

        if (empty($debugLog)) : ?>
            <p>The log is empty</p>
        <?php else : ?>
            <form method="POST">
                <input type="hidden" name="sli_clear_log" value="<?= wp_create_nonce('sli_clear_log') ?>" />
                <button type="submit" class="button">Clear log</button>
            </form>

            <br />

            <details>
                <summary>Show/Hide</summary>
                <pre class="sli-debug-log"><?= $debugLog ?></pre>
            </details>

            <style type="text/css">
                .sli-debug-log {
                    padding: 5px;
                    background: rgba(0, 0, 0, 0.1);
                    overflow-x: auto;
                }

                summary {
                    cursor: pointer;
                    user-select: none;
                }
            </style>
        <?php
        endif;
    }

    /**
     * Renders the DB tab.
     *
     * @since 0.1
     */
    protected function dbTab()
    {
        /* @var $cpt PostType */
        $cpt = $this->container->get('media/cpt');

        $mediaList = $cpt->query();

        $page = filter_input(INPUT_GET, 'db_page', FILTER_SANITIZE_NUMBER_INT);
        $page = empty($page) ? 1 : max(1, intval($page));

        [$mediaList, $totalNum, $numPages] = Arrays::paginate($mediaList, $page, 50);

        $prevPageUrl = $page > 1 ? admin_url('admin.php?page=sli-dev&tab=db&db_page=' . ($page - 1)) : '';
        $nextPageUrl = $page < $numPages ? admin_url('admin.php?page=sli-dev&tab=db&db_page=' . ($page + 1)) : '';

        $headings = function () {
            ?>
            <tr>
                <th class="sli-db-col-id">ID</th>
                <th class="sli-db-col-link">Link</th>
                <th class="sli-db-col-caption">Caption</th>
                <th class="sli-db-col-type">Type</th>
                <th class="sli-db-col-source">Source</th>
                <th class="sli-db-col-date">Date &amp; Time</th>
                <th class="sli-db-col-last-seen">Last seen</th>
            </tr>
            <?php
        };

        ?>
        <style>
            .sli-db-col-caption {
                word-break: break-word;
            }
        </style>

        <h2>Media</h2>

        <div class="tablenav top">
            <div class="alignleft actions">
                <form method="POST">
                    <input type="hidden" name="sli_delete_meta" value="<?= wp_create_nonce('sli_delete_media') ?>" />
                    <button type="submit" class="button">Delete all</button>
                </form>
            </div>
            <div class="tablenav-pages <?= ($numPages <= 1 ? 'one-page' : '') ?>">
                <span class="displaying-num"><?= $totalNum ?> items</span>
                <?php if ($numPages > 1): ?>
                    <span class="pagination-links">
                    <?php if ($page > 1) : ?>
                        <a class="tablenav-pages-navspan button" href="<?= $prevPageUrl ?>">&lsaquo;</a>
                    <?php else: ?>
                        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&lsaquo;</span>
                    <?php endif; ?>

                    <span class="paging-input">
                        <span class="tablenav-paging-text">
                            &nbsp;
                            <span><?= $page ?></span>
                            of
                            <span><?= $numPages ?></span>
                            &nbsp;
                        </span>
                    </span>

                    <?php if ($page < $numPages) : ?>
                        <a class="tablenav-pages-navspan button" href="<?= $nextPageUrl ?>">&rsaquo;</a>
                    <?php else: ?>
                        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">&rsaquo;</span>
                    <?php endif; ?>
                </span>
                <?php endif; ?>
            </div>
            <br class="break" />
        </div>

        <table class="widefat striped sli-db-table">
            <thead>
                <?php $headings() ?>
            </thead>
            <tbody>
                <?php if (empty($mediaList)) : ?>
                    <tr>
                        <td colspan="6">There are no media posts in the database.</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($mediaList as $media): ?>
                    <tr>
                        <td class="sli-db-col-id"><?= $media->ID ?></td>
                        <td class="sli-db-col-link">
                            <?php if (empty($media->{MediaPostType::URL})): ?>
                                <?= $media->{MediaPostType::MEDIA_ID} ?> <i>(Missing media URL)</i>
                            <?php else: ?>
                                <a href="<?= $media->{MediaPostType::URL} ?>" target="_blank">
                                    <?= $media->{MediaPostType::MEDIA_ID} ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="sli-db-col-caption">
                            <?= $media->{MediaPostType::CAPTION} ?>
                        </td>
                        <td class="sli-db-col-type">
                            <?= $media->{MediaPostType::TYPE} ?>
                        </td>
                        <td class="sli-db-col-source">
                            <?php

                            $username = $media->{MediaPostType::USERNAME};

                            if (!empty($username)) {
                                echo $username;
                            } else {
                                $isHashtag = stripos($media->{MediaPostType::SOURCE_TYPE}, 'hashtag');
                                $prefix = $isHashtag ? '#' : '';

                                echo $prefix . $media->{MediaPostType::SOURCE_NAME};
                            }
                            ?>
                        </td>
                        <td class="sli-db-col-date"><?= $media->{MediaPostType::TIMESTAMP} ?></td>
                        <td class="sli-db-col-last-seen">
                            <?= date(DATE_ISO8601, $media->{MediaPostType::LAST_REQUESTED}) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php $headings() ?>
            </tfoot>
        </table>
        <?php

    }

    /**
     * Renders the services tab.
     *
     * @since 0.1
     */
    protected function servicesTab()
    {
        [$factories] = $this->core->getCompiledServices();

        $keys = array_keys($factories);
        $tree = ServiceTree::buildTree('/', $keys, $this->container);

        echo '<h2>Services</h2>';
        echo ServiceTree::renderTree($tree);
    }
}
