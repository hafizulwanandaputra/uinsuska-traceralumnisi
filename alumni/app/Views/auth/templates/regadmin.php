<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.78.1">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/examples/checkout/checkout.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/examples/modals/modals.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans+Mono:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="<?= base_url('fontawesome/css/all.css'); ?>" rel="stylesheet">
    <style>
        :root {
            --bs-font-sans-serif: "Noto Sans", "Noto Sans Arabic", system-ui, -apple-system, sans-serif, "Noto Color Emoji";
            --bs-font-monospace: "Noto Sans Mono", "Courier New", monospace, "Noto Color Emoji";
            font-variant-numeric: proportional-nums;
        }

        .bg-gradient {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .bg-gradient-header {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 20px, rgba(64, 64, 64, 0.15) 20px, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .bg-gradient-navbar {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 35px, rgba(64, 64, 64, 0.15) 35px, rgba(64, 64, 64, 0.15) 100%) !important;
        }

        .form-control::file-selector-button {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.4) 0%,
                    rgba(192, 192, 192, 0.2) 50%, rgba(64, 64, 64, 0.15) 50%, rgba(192, 192, 192, 0.15) 100%) !important;
        }

        .profile {
            width: 128px;
        }

        @media (min-width: 768px) {

            .profile {
                width: 32px;
            }
        }

        .nomor {
            font-variant-numeric: tabular-nums;
            -moz-appearance: textfield;
        }

        .nomor::-webkit-outer-spin-button,
        .nomor::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .ssBtnDefault {
            position: absolute;
            z-index: 100000000;
            background: none;
            border: none;
            outline: none;
            right: 0;
            cursor: pointer;
            width: 26px;
            height: 26px;
            margin: 0;
            padding: 0;
            top: 8px;
            right: 8px;
            opacity: .6;
            pointer-events: all;
            transition-duration: .25s
        }

        .ssBtnDefault:hover {
            opacity: 1 !important;
            transition-duration: .25s
        }

        .ssBtnDefault .fade {
            transition-duration: 5s;
            opacity: 0
        }

        .ssBtnYouTube {
            background: none;
            border: none;
            margin-right: 20px !important;
            padding-top: 0px !important;
            width: 25px !important
        }

        .ytp-embed .ssBtnYouTube {
            width: 20px !important;
            margin-right: 15px !important
        }

        .ssBtnVimeo {
            height: 2rem !important;
            width: 2rem !important;
            margin-top: 8px !important
        }

        .ssBtnVimeo button {
            width: 100% !important;
            height: 100% !important
        }

        .ssBtnVimeo button svg {
            width: 19px
        }

        .ssBtnNetflix {
            background: none;
            border: none;
            cursor: pointer;
            width: 4rem;
            margin: 0 .5rem;
            display: inline-block;
            flex-shrink: 0
        }

        .ssBtnNetflix>svg {
            transform: translateY(-0.3rem)
        }

        .ssBtnNetflix:hover {
            transform: scale(1.2);
            transition-duration: .25s
        }

        .ssBtnHulu {
            width: 27px;
            margin-top: 4px;
            margin-right: 10px;
            opacity: .7;
            cursor: pointer
        }

        .ssBtnHulu:hover {
            opacity: 1
        }

        .ssBtnAmazon {
            margin-right: 1.5vw;
            outline: none;
            cursor: pointer;
            opacity: .8
        }

        .ssBtnAmazon:hover {
            opacity: 1
        }

        @media(min-width: 1200px) {
            .ssBtnAmazon {
                width: 1.6666666667vw;
                height: 1.6666666667vw
            }
        }

        @media(max-width: 1199px) {
            .ssBtnAmazon {
                width: 20px;
                height: 20px
            }
        }

        .ssBtnHBO {
            width: 48px;
            height: 48px;
            position: relative;
            opacity: .7;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .ssBtnHBO:hover {
            opacity: 1;
            transform: scale(1.2)
        }

        .ssBtnHBO svg {
            width: 24px;
            height: 24px
        }

        .ssBtnDisney {
            opacity: .7
        }

        .ssBtnDisney:hover {
            opacity: 1
        }

        .ssBtnDisney svg {
            width: 25px !important;
            height: 31px !important;
            padding-top: 4px;
            margin-right: 7px
        }

        .ssBtnApple {
            cursor: pointer;
            opacity: .7
        }

        .ssBtnApple:hover {
            opacity: 1
        }

        .ssBtnApple svg {
            width: 22px !important;
            height: 22px !important;
            margin-right: 2px !important
        }

        body #ssTempHolder {
            position: fixed;
            z-index: 1000000000000;
            width: 100%;
            height: 100%;
            top: 0;
            pointer-events: none
        }

        body #ssTempHolder video {
            width: auto !important;
            height: auto !important;
            max-width: 100% !important;
            max-height: 100% !important;
            top: 0 !important;
            left: 0 !important;
            transform: none !important
        }

        body.ssTakeScreenshot .ssElement {
            z-index: 100000000000 !important
        }

        body.ssTakeScreenshot.ssNetflix [data-uia=video-canvas] {
            z-index: 10000000
        }

        body.ssTakeScreenshot.ssNetflix video {
            background-color: #000
        }

        body.ssTakeScreenshot.ssNetflix .player-timedtext {
            display: none !important
        }

        body.ssTakeScreenshot.ssNetflix.showSubs .player-timedtext {
            display: block !important
        }

        body.ssTakeScreenshot.ssAmazon .scalingVideoContainer {
            z-index: 99999999 !important
        }

        body.ssTakeScreenshot.ssDisney .btm-media-overlays-container {
            display: none
        }

        body.ssTakeScreenshot.ssDisney .dss-hls-subtitle-overlay {
            display: none
        }

        body.ssTakeScreenshot.ssDisney.showSubs .dss-hls-subtitle-overlay {
            display: block
        }

        body.ssTakeScreenshot.ssHulu .ContentPlayer__contentArea {
            z-index: 10000000000;
            position: relative
        }

        body.ssTakeScreenshot.ssHulu .ClosedCaption {
            display: none
        }

        body.ssTakeScreenshot.ssHulu.showSubs .ClosedCaption {
            display: block
        }

        body.ssTakeScreenshot.ssHulu.showSubs .ClosedCaption .ClosedCaption__outband {
            bottom: 30px !important
        }

        body.ssTakeScreenshot.ssHBO video {
            z-index: 99999999
        }

        body.ssTakeScreenshot.ssHBO *:has(video) {
            z-index: 99999999
        }

        body.ssTakeScreenshot.ssYoutube .html5-video-container,
        body.ssTakeScreenshot.ssYoutube .ytp-caption-window-container {
            z-index: 999999999 !important
        }

        body.ssTakeScreenshot.ssApple #apple-music-video-player {
            z-index: 999999999 !important
        }

        body.ssTakeScreenshot.ssApple .scrim {
            display: none
        }

        body .ssWrapper {
            overflow: hidden
        }

        body .ssNotification {
            display: flex;
            width: 100%;
            height: 4rem;
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 1000000000;
            top: -4rem;
            animation-name: notification;
            animation-duration: 2s;
            animation-iteration-count: 1
        }

        @keyframes notification {
            0% {
                top: -4rem
            }

            25% {
                top: 3rem
            }

            85% {
                top: 3rem
            }
        }

        body .ssNotification .ssNContent {
            position: absolute;
            z-index: 1000000000;
            padding: .75rem 1.25em;
            margin-bottom: 1em;
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: .25em;
            font-size: 12px;
            height: fit-content;
            top: 0
        }

        body .ssNotification .ssNContent.success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724
        }

        body .ssNotification .ssNContent.fail {
            background-color: #edd4d4;
            border-color: #e6c3c3;
            color: #b62424
        }

        body .ssModal {
            display: none;
            position: fixed;
            z-index: 100000000;
            right: 20px;
            opacity: 0;
            background-color: #fffefa;
            border-radius: 3px;
            padding: 25px;
            color: #525252;
            font-family: muli, sans-serif;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, .15);
            animation-name: animateOn;
            animation-duration: .2s;
            animation-fill-mode: forwards
        }

        body .ssModal.visible {
            display: block
        }

        body .ssModal * {
            vertical-align: middle;
            line-height: normal;
            font-weight: normal
        }

        @keyframes animateOn {
            from {
                opacity: 0;
                top: 0px
            }

            to {
                opacity: 1;
                top: 20px
            }
        }

        body .ssModal .close {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            opacity: .5;
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI3LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCA0NDMuNCA0NDMuNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDQzLjQgNDQzLjQ7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHBhdGggZD0iTTYuOCw0MDMuNWwxODEuOC0xODEuOEw2LjgsMzkuOWMtNS45LTUuOS04LjItMTQuNS02LTIyLjZDMyw5LjIsOS4yLDMsMTcuMywwLjhjOC4xLTIuMiwxNi43LDAuMSwyMi42LDZsMTgxLjgsMTgxLjgKCUw0MDMuNSw2LjhjNS45LTUuOSwxNC41LTguMiwyMi42LTZjOC4xLDIuMiwxNC40LDguNCwxNi41LDE2LjVjMi4yLDguMS0wLjEsMTYuNy02LDIyLjZMMjU0LjcsMjIxLjdsMTgxLjgsMTgxLjgKCWM1LjksNS45LDguMiwxNC41LDYsMjIuNmMtMi4yLDguMS04LjQsMTQuNC0xNi41LDE2LjVjLTguMSwyLjItMTYuNy0wLjEtMjIuNi02TDIyMS43LDI1NC43TDM5LjksNDM2LjVjLTUuOSw1LjktMTQuNSw4LjItMjIuNiw2CglDOS4yLDQ0MC40LDMsNDM0LjEsMC44LDQyNkMtMS40LDQxOCwwLjksNDA5LjQsNi44LDQwMy41TDYuOCw0MDMuNXoiLz4KPC9zdmc+Cg==);
            width: 10px;
            height: 10px
        }

        body .ssModal .ssButtons {
            margin-top: 25px;
            text-align: right
        }

        body .ssModal .ssButtons .ssButton,
        body .ssModal .ssButtons a .ssButton {
            display: inline-block;
            height: 20px;
            padding: 3px 12px 3px;
            margin-left: 14px;
            border-radius: 4px;
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, .15);
            background-color: #fff;
            font-size: 12px;
            color: #525252;
            line-height: 20px;
            font-weight: normal;
            cursor: pointer;
            text-decoration: none
        }

        body .ssModal .ssButtons .ssButton .emoji,
        body .ssModal .ssButtons a .ssButton .emoji {
            font-size: 15px;
            vertical-align: bottom
        }

        body .ssModal .ssButtons .ssButton.blue,
        body .ssModal .ssButtons a .ssButton.blue {
            background-color: #19acef;
            color: #fff
        }

        body .ssModal .icon {
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDI1LjIuMywgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIKCSBpZD0iTGF5ZXJfMSIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSIgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIiB4bWxuczpzb2RpcG9kaT0iaHR0cDovL3NvZGlwb2RpLnNvdXJjZWZvcmdlLm5ldC9EVEQvc29kaXBvZGktMC5kdGQiIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCgkgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMDAgODMuOSIKCSBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMDAgODMuOTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsOiMwMEFERUY7fQo8L3N0eWxlPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC05NTIuMzYyMTgpIj4KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0zNS42LDk1Mi40Yy0xLjMsMC0yLjQsMS0yLjksMS44bC01LjYsMTEuMUgxMWMtNiwwLTExLDUtMTEsMTF2NDljMCw2LDUsMTEsMTEsMTFoNzhjNiwwLDExLTUsMTEtMTF2LTQ5CgkJYzAtNi01LTExLTExLTExSDcyLjlsLTUuNi0xMS4xYy0wLjUtMS4xLTEuNi0xLjgtMi45LTEuOEwzNS42LDk1Mi40TDM1LjYsOTUyLjR6IE0zNy42LDk1OC44aDI1LjJsNS41LDExLjEKCQljMC41LDEuMSwxLjYsMS44LDIuOSwxLjhoMTguMWMyLjYsMCw0LjUsMS45LDQuNSw0LjV2NDljMCwyLjYtMS45LDQuNS00LjUsNC41SDExLjFjLTIuNiwwLTQuNS0xLjktNC41LTQuNXYtNDkKCQljMC0yLjYsMS45LTQuNSw0LjUtNC41aDE4LjFjMS4xLDAsMi40LTAuOCwyLjktMS44TDM3LjYsOTU4Ljh6IE01MC4yLDk3OS44Yy0xMS42LDAtMjEsOS40LTIxLDIxczkuNCwyMSwyMSwyMXMyMS05LjQsMjEtMjEKCQlTNjEuOCw5NzkuOCw1MC4yLDk3OS44eiBNNTAuMiw5ODYuMmM4LjEsMCwxNC41LDYuNSwxNC41LDE0LjVzLTYuNSwxNC41LTE0LjUsMTQuNXMtMTQuNS02LjUtMTQuNS0xNC41UzQyLjEsOTg2LjIsNTAuMiw5ODYuMnoiLz4KPC9nPgo8L3N2Zz4K);
            background-repeat: no-repeat;
            width: 30px;
            height: 30px;
            vertical-align: top;
            margin-right: 22px;
            margin-top: 2px;
            display: inline-block
        }

        body .ssModal .body {
            display: inline-block;
            width: 315px
        }

        body .ssModal .body .title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 7px
        }

        body .ssModal .body .description {
            font-size: 13px;
            font-weight: lighter
        }

        .modal {
            backdrop-filter: blur(50px);
        }

        .modal-backdrop {
            --bs-backdrop-opacity: 0;
        }

        .fade {
            transition: opacity 0.15s linear;
        }

        .modal.fade .modal-dialog {
            backdrop-filter: blur(50px);
            transition: transform 0.15s ease-in-out;
            transform: scale(0.9);
        }

        .modal.show .modal-dialog {
            backdrop-filter: blur(50px);
            transform: none;
        }
    </style>
    <title><?= $title; ?></title>
</head>

<body class="bg-body-tertiary">

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/5.3/examples/checkout/checkout.js"></script>
    <script src="<?= base_url('fontawesome/js/all.js'); ?>"></script>
    <script src="<?= base_url('js/color-modes.js'); ?>"></script>
    <script>
        feather.replace({
            'aria-hidden': 'true'
        });
    </script>
</body>

</html>