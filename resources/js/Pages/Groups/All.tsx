import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Card, Flex, Avatar, Box, Text } from "@radix-ui/themes";

export default function All({ auth, groups }: PageProps) {
    return (
        <>
            <Head title="Dashboard" />
        </>
    );
}
