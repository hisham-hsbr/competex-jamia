        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b> Version</b> {{ $settings['app_version'] }}
            </div>
            <strong>Copyright &copy; {{ $settings['developer_app_starting_year'] }}-<?php echo date('Y'); ?> <a
                    href="{{ $settings['developer_company_website'] }}"
                    target="_blank">{{ $settings['developer_company_name'] }}</a>.</strong>
            All rights reserved.
        </footer>
