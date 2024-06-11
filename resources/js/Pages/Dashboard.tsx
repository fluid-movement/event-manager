import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Heading } from "@radix-ui/themes";

export default function Dashboard(props: PageProps) {
    console.log(props);
    return (
        <>
            <Head title="Dashboard" />
        </>
    );
}
