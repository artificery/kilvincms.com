<?php

namespace App\Http\Controllers;

use App\Libraries\Documentation;

class DocsController extends Controller
{
    /**
     * The documentation repository.
     *
     * @var Documentation
     */
    protected $docs;

    /**
     * Create a new controller instance.
     *
     * @param  Documentation  $docs
     * @return void
     */
    public function __construct(Documentation $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Show a documentation page.
     *
     * @param  string|null $page
     * @return Response
     */
    public function show($page = null)
    {
        $sectionPage = $page ?: 'index';
        $content = $this->docs->get($sectionPage);

        if (is_null($content)) {
            return response()->view('docs.page', [
                'title' => 'Page not found',
                'content' => view('docs.missing'),
                'menu' => $this->docs->get('documentation'),
                'is_docs' => true,
                'breadcrumb' => ['name' => 'Documentation', 'link' => secure_url('docs')],
            ], 404);
        }

        $title = $section = '';

        if (preg_match('/<h1>(.+)<\/h1>/is', $content, $match)) {
            $title = $match[1];
        }

        return view('docs.page', [
            'title' => $title,
            'content' => $content,
            'menu' => $this->docs->get('documentation'),
            'is_docs' => true,
        ]);
    }
}
