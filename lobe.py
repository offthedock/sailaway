#!/usr/bin/env python3

import os,sys,click

#*******************************************************************************

def shell(command, *argument, **options):
    args = lambda value: ('"%s"' % value) if ((" " in value) or ("?" in value)) else value

    if options.get('x11',False):
        command = "gnome-terminal"

        argument = ['-c', '"%s %s"' % (command,' '.join([args(x) for x in argument]))]

    stmt = ' '.join([command] + [args(x) for x in argument])

    os.system(stmt)

def ensure_dir(ctx,*path):
    dest = ctx.obj['rpath'](*path)

    if not os.path.exists(dest):
        shell('mkdir','-p',dest)

    os.chdir(dest)

#*******************************************************************************

@click.group()
@click.option('--debug/--no-debug', default=False)
@click.pass_context
def cli(ctx,debug):
    ctx.obj['bpath'] = os.path.dirname(__file__)
    ctx.obj['rpath'] = lambda *x: os.path.join(ctx.obj['bpath'], *x)
    ctx.obj['bpath'] = "/media/chromebook/OffTheDock"

    click.echo('Base dir : %(bpath)s' % ctx.obj)

    ctx.obj['debug'] = debug

    #click.echo(f"Debug mode is {'on' if debug else 'off'}")

################################################################################

@cli.command('hdt')
@click.option('--tool/--no-tool', default=False)
@click.option('--min/--no-min', default=False)
@click.option('--base/--no-base', default=False)
@click.option('--geo/--no-geo', default=False)
@click.option('--wiki/--no-wiki', default=False)
@click.option('--dbp/--no-dbp', default=False)
@click.option('--core/--no-core', default=False)
@click.option('--all/--no-all', default=False)
@click.option('--language','-l',multiple=True, default=[
    'arabic','french','english','spanish','german','italian','hungarian'
])
@click.option('--version','-v', type=str, default='4.3.2')
@click.pass_context
def rdf_hdt_org(ctx,tool,min,base,geo,wiki,dbp,core,all,language,version):
    click.echo('RDF-HDT.org :')

    src = ctx.obj['rpath']('prog','stanford-corenlp-latest.zip')
    url = 'https://nlp.stanford.edu/software/stanford-corenlp-latest.zip'
    dst = ctx.obj['rpath']('lobe','hdt')
    pth = ctx.obj['rpath']('prog','hdt')

    if tool and not os.path.exists(src):
        os.chdir(ctx.obj['rpath']('prog'))

        shell('wget','-c','-nv',url)

    if not os.path.exists(dst):
        shell('mkdir','-p',dst)

    os.chdir(dst)

    if os.path.exists(src):
        shell('unzip','-o',src)

    if not os.path.exists(pth):
        shell('mkdir','-p',pth)

    os.chdir(pth)

    lst = []

    if all or min:
        lst += [
            'http://gaia.infor.uva.es/hdt/%s.hdt' % x for x in (
                'swdf-2012-11-28',
            )
        ]

    if all or base:
        lst += [
            'http://gaia.infor.uva.es/hdt/%s.hdt' % x for x in (
                'wordnet-2013-03-20',
                'wordnet31',
            )
        ]

    if all or geo:
        lst += [
            'http://gaia.infor.uva.es/hdt/%s.hdt.gz' % x for x in (
                'geonames-11-11-2012',
                'linkedgeodata-2012-09-10',
                'yago2s-2013-05-08',
            )
        ]

    if all or wiki:
        lst += [
            'http://gaia.infor.uva.es/hdt/wiktionary_%s_2012-07-21.hdt.gz' % x for x in (
                'en','fr','de','ru'
            )
        ]

    if all or dbp:
        lst += [
            'http://gaia.infor.uva.es/hdt/%s' % x for x in (
                'dblp-20170124.hdt', 'dblp-20170124.hdt.index.v1-1',
            )
        ]

    if all or core:
        lst += [
            'http://gaia.infor.uva.es/hdt/%s.hdt.gz' % x for x in (
                'DBPedia-3.9-en',
            )
        ]

    shell('wget','-c',*lst)

################################################################################

@cli.command('corenlp')
@click.option('--download/--no-wget', default=False)
@click.option('--extract/--no-zip', default=False)
@click.option('--models/--no-jar', default=False)
@click.option('--language','-l',multiple=True, default=[
    'arabic','french','english','spanish','german','italian','hungarian'
])
@click.option('--version','-v', type=str, default='4.3.2')
@click.pass_context
def stanford(ctx,download,extract,models,language,version):
    click.echo('Stanford CoreNLP :')

    src = ctx.obj['rpath']('prog','stanford-corenlp-latest.zip')
    url = 'https://nlp.stanford.edu/software/stanford-corenlp-latest.zip'
    dst = ctx.obj['rpath']('lobe','nlp','core')

    if download and not os.path.exists(src):
        os.chdir(ctx.obj['rpath']('prog'))

        shell('wget','-c','-nv',url)

    if not os.path.exists(dst):
        shell('mkdir','-p',dst)

    os.chdir(dst)

    if os.path.exists(src):
        shell('unzip','-o',src)

    if os.path.exists('stanford-corenlp-'+version):
        shell('mv','-v','stanford-corenlp-'+version+'/*','.')

        shell('rmdir','stanford-corenlp-'+version+'/')

    if models:
        dst = ctx.obj['rpath']('prog','jar','corenlp')

        if not os.path.exists(dst):
            shell('mkdir','-p',dst)

        os.chdir(dst)

        for alias in language:
            pth = 'stanford-corenlp-%s-models-%s.jar' % (version,alias)

            if not os.path.exists(pth):
                url = 'https://nlp.stanford.edu/software/' + pth

                shell('wget','-c',url)

            pass

        pass

    pass

#*******************************************************************************

@cli.command('nltk')
@click.option('--install/--no-setup', default=False)
@click.option('--download/--no-fetch', default=False)
@click.option('--language','-l',multiple=True, default=['ar','fr','en'])
@click.pass_context
def nltk_trainer(ctx,install,download,language):
    click.echo('NLTK corporas :')

    dest = ctx.obj['rpath']('lobe','nlp','nltk')

    if not os.path.exists(dest):
        shell('mkdir','-p',dest)

    os.environ['NLTK_DATA'] = dest

    shell('python2','-m','nltk.download','--all')

#*******************************************************************************

@cli.command('spacy')
@click.option('--install/--no-setup', default=False)
@click.option('--download/--no-fetch', default=False)
@click.option('--language','-l',multiple=True, default=['ar','fr','en'])
@click.option('--graphql/--no-query', default=False)
@click.pass_context
def machinalis(ctx,install,download,language,graphql):
    click.echo('SpaCy machine :')

    pass

################################################################################

@cli.command('opencv')
@click.pass_context
def openvino_zoo(ctx):
    click.echo('OpenCV Model Zoo :')

    dest = ctx.obj['rpath']('lobe','eye','open')

    if not os.path.exists(dest):
        shell('git','clone','https://github.com/openvinotoolkit/open_model_zoo.git',dest)

    os.chdir(dest)

    #shell('tools/model_tools/downloader.py','--all','--output_dir',dest)

    #shell('omz_downloader','--all','--output_dir',dest)

#*******************************************************************************

@cli.command('tensor')
@click.option('--lite/--no-lite', default=False)
@click.option('--hand/--no-hand', default=False)
@click.option('--pose/--no-pose', default=False)
@click.option('--all/--default', default=False)
@click.pass_context
def tensor_flow_js(ctx,lite,hand,pose,all):
    click.echo('TensorFlow.js artefacts :')

    if all or lite:
        ensure_dir(ctx,'eye','tfjs','ssd_lite','mobilenet_v2') ; z = 5

        click.echo('\t-> SSD lite (MobileNet v2) ...')

        shell('wget','-c',*[
            'https://storage.googleapis.com/tfjs-models/savedmodel/ssdlite_mobilenet_v2/' + x
            for x in ['model.json']+[
                'group1-shard%dof%d' % (y,z) for y in range(1,z)
            ]
        ])

    if all or hand:
        ensure_dir(ctx,'eye','tfjs','handpose','detector') ; z = 2

        click.echo('\t-> Hand-pose (detector) ...')

        shell('wget','-c',*[
            'https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handdetector/1/default/1/' + x
            for x in ['model.json']+[
                'group1-shard%dof%d.bin' % (y,z) for y in range(1,z)
            ]
        ])
        shell('wget','-c','https://tfhub.dev/mediapipe/tfjs-model/handdetector/1/default/1/model.json?tfjs-format=file')

        ensure_dir(ctx,'eye','tfjs','handpose','skeleton') ; z = 2

        click.echo('\t-> Hand-pose (skeleton) ...')

        shell('wget','-c',*[
            'https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handskeleton/1/default/1/' + x
            for x in ['anchors.json','model.json']+[
                'group1-shard%dof%d.bin' % (y,z) for y in range(1,z)
            ]
        ])
        shell('wget','-c','https://tfhub.dev/mediapipe/tfjs-model/handskeleton/1/default/1/anchors.json?tfjs-format=file')
        shell('wget','-c','https://tfhub.dev/mediapipe/tfjs-model/handskeleton/1/default/1/model.json?tfjs-format=file')

    if all or pose:
        ensure_dir(ctx,'eye','tfjs','posenet') ; z = 2

        click.echo('\t-> PoseNet (skeleton) ...')

################################################################################

if __name__ == '__main__':
    cli(
        obj={},
    )
