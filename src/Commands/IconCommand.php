<?php

namespace Abitbt\TablerBlade\Commands;

use Abitbt\TablerBlade\Icon;
use Illuminate\Console\Command;

class IconCommand extends Command
{
    protected $signature = 'tabler:icon
                            {action : The action to perform (search, list, clear-cache, exists)}
                            {query? : Search query or icon name}
                            {--variant=outline : Icon variant (outline, filled)}';

    protected $description = 'Manage Tabler icons';

    public function handle(): int
    {
        $action = $this->argument('action');

        return match ($action) {
            'search' => $this->handleSearch(),
            'list' => $this->handleList(),
            'clear-cache' => $this->handleClearCache(),
            'exists' => $this->handleExists(),
            default => $this->handleInvalidAction($action),
        };
    }

    protected function handleSearch(): int
    {
        $query = $this->argument('query');

        if (! $query) {
            $this->error('Search query is required.');

            return self::FAILURE;
        }

        $this->info("Searching for icons matching: {$query}");

        $results = Icon::search($query);

        if (empty($results)) {
            $this->warn('No icons found matching your query.');

            return self::SUCCESS;
        }

        $this->info(sprintf('Found %d icon(s):', count($results)));
        $this->newLine();

        foreach ($results as $iconName) {
            $this->line("  • {$iconName}");
        }

        return self::SUCCESS;
    }

    protected function handleList(): int
    {
        $manifest = Icon::getManifest();

        if (empty($manifest)) {
            $this->warn('No icons found. Make sure @tabler/icons is installed via npm.');

            return self::FAILURE;
        }

        $iconNames = array_keys($manifest);
        $count = count($iconNames);

        $this->info("Found {$count} available icons:");
        $this->newLine();

        // Display in columns for better readability
        $columns = 3;
        $chunked = array_chunk($iconNames, ceil($count / $columns));

        $maxLength = max(array_map('strlen', $iconNames));

        for ($i = 0; $i < count($chunked[0]); $i++) {
            $row = '';
            for ($col = 0; $col < $columns; $col++) {
                if (isset($chunked[$col][$i])) {
                    $row .= str_pad($chunked[$col][$i], $maxLength + 2);
                }
            }
            $this->line('  '.$row);
        }

        return self::SUCCESS;
    }

    protected function handleClearCache(): int
    {
        Icon::clearCache();

        $this->info('Icon cache cleared successfully.');

        return self::SUCCESS;
    }

    protected function handleExists(): int
    {
        $iconName = $this->argument('query');
        $variant = $this->option('variant');

        if (! $iconName) {
            $this->error('Icon name is required.');

            return self::FAILURE;
        }

        $exists = Icon::exists($iconName, $variant);

        if ($exists) {
            $path = Icon::getIconPath($iconName, $variant);
            $this->info("Icon '{$iconName}' ({$variant}) exists at:");
            $this->line("  {$path}");

            return self::SUCCESS;
        }

        $this->warn("Icon '{$iconName}' ({$variant}) does not exist.");

        return self::FAILURE;
    }

    protected function handleInvalidAction(string $action): int
    {
        $this->error("Invalid action: {$action}");
        $this->info('Available actions: search, list, clear-cache, exists');

        return self::FAILURE;
    }
}
